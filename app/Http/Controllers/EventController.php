<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Models\Event;
use App\Models\Office;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $userIsAdmin = Auth::user()->isAdmin();
        if (!$userIsAdmin) {
            return redirect()->route('events.index');
        }
        $event = new Event();
        $event->fill([
            'price' => 50,
            'number_of_participants' => 10,
            'start_date' => '2021-01-01',
            'end_date' => '2021-01-01',
            'start_time' => '12:00:00',
            'end_time' => '14:00:00',
        ]);
        $offices = Office::all();
        $contractors = Contractor::all();
        $eventsTypes = [
            ['name' => 'tastingEvent', 'label' => 'Tasting Event'],
            ['name' => 'meetingEvent', 'label' => 'Meeting Event'],
            ['name' => 'professionalFormation', 'label' => 'Professional Formation'],
            ['name' => 'onlineWorkshop', 'label' => 'Online Workshop'],
            ['name' => 'homeWorkshop', 'label' => 'Home Workshop'],
        ];
        return view('events.create' , [
            'event' => $event,
            'offices' => $offices,
            'contractors' => $contractors,
            'eventsTypes' => $eventsTypes,
        ]);
    }

    public function list()
    {
        $userIsAdmin = Auth::user()->isAdmin();
        if($userIsAdmin){
            $events = Event::OrderBy('created_at', 'desc')->paginate(20);
            return view('events.list', compact('events'));
        } else {
            return redirect()->route('events.index');
        }
    }

    public function store(Request $request)
    {
        $userIsAdmin = Auth::user()->isAdmin();
        if (!$userIsAdmin) {
            return redirect()->route('events.index');
        }
        $validatedData = $request->validate([
            'contractor_id' => 'required|string',
            'type' => 'required|string',
            'name' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:500',
            'price' => 'required|integer',
            'number_of_participants' => 'required|integer',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'office_id' => 'required|string',
            'room_id' => 'required|string',
        ]);

        $event = new Event();
        $event->contractor_id = $request->contractor_id;
        $event->type = $request->type;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->price = $request->price;
        $event->number_of_participants = $request->number_of_participants;
        //
        $date_start = Carbon::createFromFormat('Y-m-d', $request->start_date);
        $formattedStartDate = $date_start->format('d-m-Y');
        $date_end = Carbon::createFromFormat('Y-m-d', $request->end_date);
        $formattedEndDate = $date_end->format('d-m-Y');
        //
        $event->start_date = $formattedStartDate;
        $event->end_date = $formattedEndDate;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->office_id = $request->office_id;
        $event->room_id = $request->room_id;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $event->img_url = $imagePath;
        } else {
            $index = rand(1, 6);
            $event->img_url = "events/".$index.".jpg";
        }

        $event->save();

        return redirect()->route('events.list')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $userIsAdmin = Auth::user()->isAdmin();
        if (!$userIsAdmin) {
            return redirect()->route('events.index');
        }

        $event = Event::findOrFail($id);
        $offices = Office::all();
        $room = Room::findOrFail($event->room_id);
        $contractors = Contractor::all();
        $eventsTypes = [
            ['name' => 'tastingEvent', 'label' => 'Tasting Event'],
            ['name' => 'meetingEvent', 'label' => 'Meeting Event'],
            ['name' => 'professionalFormation', 'label' => 'Professional Formation'],
            ['name' => 'onlineWorkshop', 'label' => 'Online Workshop'],
            ['name' => 'homeWorkshop', 'label' => 'Home Workshop'],
        ];
        return view('events.edit', [
            'event' => $event,
            'offices' => $offices,
            'contractors' => $contractors,
            'eventsTypes' => $eventsTypes,
            'room' => $room,
        ]);
    }

    public function update(Request $request, $id)
    {
        $userIsAdmin = Auth::user()->isAdmin();
        if (!$userIsAdmin) {
            return redirect()->route('events.index');
        }
        $validatedData = $request->validate([
            'contractor_id' => 'required|string',
            'type' => 'required|string',
            'name' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:500',
            'price' => 'required|integer',
            'number_of_participants' => 'required|integer',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'office_id' => 'required|string',
            'room_id' => 'required|string',
        ]);

        $event = Event::findOrFail($id);
        $event->contractor_id = $request->contractor_id;
        $event->type = $request->type;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->price = $request->price;
        $event->number_of_participants = $request->number_of_participants;
        //
        $date_start = Carbon::createFromFormat('Y-m-d', $request->start_date);
        $formattedStartDate = $date_start->format('d-m-Y');
        $date_end = Carbon::createFromFormat('Y-m-d', $request->end_date);
        $formattedEndDate = $date_end->format('d-m-Y');
        //
        $event->start_date = $formattedStartDate;
        $event->end_date = $formattedEndDate;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->office_id = $request->office_id;
        $event->room_id = $request->room_id;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $event->img_url = $imagePath;
        }

        $event->save();

        return redirect()->route('events.list')->with('success', 'Event updated successfully.');
    }
}
