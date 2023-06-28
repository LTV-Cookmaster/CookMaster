<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $workshops = Event::where('type', 'homeWorkshop')->orderBy('created_at', 'desc')->take(3)->get();

        $formations = Event::where('type', 'professionalFormation')->orderBy('created_at', 'desc')->take(3)->get();

        $onlines = Event::where('type', 'onlineWorkshop')->orderBy('created_at', 'desc')->take(3)->get();

        return view('workshops', compact(['workshops', 'formations', 'onlines']));
    }
}
