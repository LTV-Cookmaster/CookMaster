<?php

namespace App\Http\Controllers;

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

        $workshops = Workshop::where('type', 'workshop')->orderBy('created_at', 'desc')->take(3)->get();

        $formations = Workshop::where('type', 'professional formation')->orderBy('created_at', 'desc')->take(3)->get();

        $onlines = Workshop::where('type', 'online workshop')->orderBy('created_at', 'desc')->take(3)->get();

        return view('workshops', compact(['workshops', 'formations', 'onlines']));
    }
}
