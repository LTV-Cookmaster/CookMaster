<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Workshop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $workshops = Event::where('type', 'onlineWorkshop')->orderBy('created_at', 'desc')->take(3)->get();

        $formations = Event::where('type', 'professionalFormation')->orderBy('created_at', 'desc')->take(3)->get();

        return view('home', compact(['workshops', 'formations']));
    }
}
