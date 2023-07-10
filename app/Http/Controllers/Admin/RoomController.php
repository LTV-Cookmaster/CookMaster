<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomFormRequest;
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
       return view('admin.rooms.index', [
           'rooms' => Room::orderBy('created_at', 'desc')->paginate(25)
       ]);
    }


    public function create()
    {
        $room = new Room();
        $room->fill([
            'max_capacity' => 10,
            'price' => 100,
            'is_booked' => false
        ]);
        return view('admin.rooms.form' , [
            'room' => $room
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomFormRequest $request)
    {
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
