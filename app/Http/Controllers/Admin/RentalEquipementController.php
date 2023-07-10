<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RentalEquipementFormRequest;
use App\Http\Requests\Admin\equipementFormRequest;
use App\Models\CookingEquipment;
use App\Models\equipement;
use App\Models\Office;
use App\Models\RentalEquipment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RentalEquipementController extends Controller
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
        $equipements = RentalEquipment::orderBy('created_at', 'desc')->paginate(25);
        foreach ($equipements as $equipement){
            $equipement->office = Office::find($equipement->office_id);
        }
       return view('admin.equipements.index', [
           'equipements' => $equipements,
       ]);
    }


    public function create()
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $equipement = new RentalEquipment();
        $offices = Office::all();
        return view('admin.equipements.form' , [
            'equipement' => $equipement,
            'offices' => $offices
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RentalEquipementFormRequest $request)
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $equipement = RentalEquipment::create($request->validated());
        return redirect()->route('admin.equipement.index')->with('success', __('L\'équipement à été crée'));
    }
    public function edit(string $id)
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $equipement = RentalEquipment::findOrFail($id);
        $offices = Office::all();
        return view('admin.equipements.form' , [
            'equipement' => $equipement,
            'offices' => $offices
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RentalEquipementFormRequest $request, string $id)
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $equipement = RentalEquipment::findOrFail($id);
        $equipement->update($request->validated());
        return redirect()->route('admin.equipement.index')->with('success', __('L\'équipement à été modifié'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
