<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $workshopsList = $user->reservations->load('workshop');
            return view('user.reservations', compact('user', 'workshopsList'));
        } else {
            return redirect()->route('login');
        }
    }
}
