<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        if (Auth::user()->is_admin) {
            return view('events.calendarAdmin');
        } else {
            return view('home');
        }
    }

    public function user()
    {
        $user = Auth::user();
        return view('events.calendarUser', compact('user'));
    }
}
