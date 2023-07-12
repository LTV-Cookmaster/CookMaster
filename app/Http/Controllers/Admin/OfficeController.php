<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\Room;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $offices = Office::orderBy('created_at', 'desc')->paginate(10);
        /*
        foreach ($offices as $office) {
            $office->rooms_count = Room::where('office_id', $office->id)->count();
        }*/
        foreach ($offices as $office) {
            $office->number_of_rooms = Room::where('office_id', $office->id)->count();
            /*$office->update();*/
        }
        return view('admin.offices.index', [
            'offices' => $offices
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

    public function list(Office $office)
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $rooms = $office->rooms;
        $officeName = $office->name;
        return view('admin.offices.list', ['rooms' => $rooms, 'officeName' => $officeName]);
    }
}
