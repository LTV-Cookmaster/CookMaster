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

        return view('events', compact(['tastings', 'meetings', 'professional', 'onlineEvent', 'homeEvent']));
    }
}
