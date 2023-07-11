<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\FormationData;
use App\Models\Reservation;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowEventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)

    {
            $eventID = $request->route('event');
            $event = Event::findOrFail($eventID);
            $userId = Auth::user()->id;

            if (Reservation::where('event_id', $eventID)->where('user_id', $userId)->exists()) {
                $reserve = true;
            } else {
                $reserve = false;
            }

            $reservationCount = Reservation::where('event_id', $eventID)->count();
            if($event->type == 'professionalFormation') {
                $formationData = FormationData::where('formation_id', $eventID)->first();
                $event->formationData = $formationData;
            }

            return view('workshops.showWorkshop' , [
                'event' => $event,
                'reserve' => $reserve,
                'reservationCount' => $reservationCount,

            ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
