<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $tastings = Event::where('type', 'tastingEvent')->orderBy('created_at', 'desc')->take(3)->get();

        $meetings = Event::where('type', 'meetingEvent')->orderBy('created_at', 'desc')->take(3)->get();

        $professional = Event::where('type', 'professionalFormation')->orderBy('created_at', 'desc')->take(3)->get();

        $onlineEvent = Event::where('type', 'onlineWorkshop')->orderBy('created_at', 'desc')->take(3)->get();

        $homeEvent = Event::where('type', 'homeWorkshop')->orderBy('created_at', 'desc')->take(3)->get();

        return view('events.index', compact(['tastings', 'meetings', 'professional', 'onlineEvent', 'homeEvent']));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->contractor()->associate($request->contractor);
        $event->name = $request->name;
        $event->type = $request->type;
        $event->description = $request->description;
        $event->price = $request->price;
        $event->address = $request->address;
        $event->numberOfParticipants = $request->numberOfParticipants;
        $event->startDate = $request->startDate;
        $event->endDate = $request->endDate;
        $event->startTime = $request->startTime;
        $event->endTime = $request->endTime;
        $event->image = $request->image;
        $event->save();
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }
}
