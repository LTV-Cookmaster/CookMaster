<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $tastings = Event::where('type', 'tastingEvent')->orderBy('created_at', 'desc')->take(3)->get();

        $meetings = Event::where('type', 'meetingEvent')->orderBy('created_at', 'desc')->take(3)->get();

        return view('events', compact(['tastings', 'meetings']));
    }
}
