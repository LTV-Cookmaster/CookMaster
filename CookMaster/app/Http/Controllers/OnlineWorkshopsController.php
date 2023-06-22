<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlineWorkshopsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)

    {
            /*$workshop = Workshop::where('id' , $workshops->id)->get();*/

            $workshopId = $request->route('workshop');
            $workshop = Workshop::findOrFail($workshopId);
            $userId = Auth::user()->id;

            if (Reservation::where('workshop_id', $workshopId)->where('user_id', $userId)->exists()) {
                $reserve = true;
            } else {
                $reserve = false;
            }
            return view('workshops.online' , [
                'workshop' => $workshop,
                'reserve' => $reserve
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
