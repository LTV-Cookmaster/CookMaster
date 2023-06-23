<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReservationsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $reservations = $user->reservations->load('workshop');
            if($reservations->count() > 0) {
                return view('user.reservations', compact('user', 'reservations'));
            } else {
                return redirect()->route('home')->with('error', ("Vous n'avez aucune réservation"));
            }
        } else {
            return redirect()->route('login');
        }
    }
}
