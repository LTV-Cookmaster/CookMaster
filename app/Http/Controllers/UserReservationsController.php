<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*public function index()
    {
        $user = Auth::user();
        if ($user) {
            if(Reservation::where('user_id' === $user->id)->exists()){
                $reservation = Reservation::where('user_id' === $user->id);
                dd($reservation);
            }else{
                dd('no reservation found');
            }

            return view('user.reservations', compact('user', 'workshopsList'));
        } else {
            return redirect()->route('login');
        }
    }*/
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $reservations = Reservation::where('user_id', $user->id)->get();
            $events = $reservations->map(function ($reservation) {
                return $reservation->event;
            });
            if ($reservations) {
                return view('user.reservations', compact('user', 'reservations' , 'events'));
            } else {
                return redirect()->route('home')->with('error', 'No reservation found');
            }

        }
    }


}
