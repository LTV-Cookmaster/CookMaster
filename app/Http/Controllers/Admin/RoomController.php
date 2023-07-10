<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomFormRequest;
use App\Models\Office;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
       return view('admin.rooms.index', [
           'rooms' => Room::orderBy('created_at', 'desc')->paginate(25)
       ]);
    }


    public function create()
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $room = new Room();
        $room->fill([
            'max_capacity' => 10,
            'price' => 100,
            'is_booked' => false
        ]);
        $offices = Office::all();
        return view('admin.rooms.form' , [
            'room' => $room,
            'offices' => $offices
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomFormRequest $request)
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $room = Room::create($request->validated());
        return redirect()->route('admin.room.index')->with('success', __('La salle à été crée'));
    }
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
