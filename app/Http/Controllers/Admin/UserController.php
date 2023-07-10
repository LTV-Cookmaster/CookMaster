<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserFormRequest;
use App\Http\Resources\InvoiceCollection;
use App\Http\Resources\QuotationCollection;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Property;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        return view('admin.users.index', [
           'users' => User::orderBy('created_at' , 'desc')->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $user = new User();
        $user->fill([
            'name' => 'test',
            'address' => 'Rue du faubourg saint antoine',
            'city' => 'Paris',
            'country' => 'France',
            'postal_code' => '75012',
            'phone' => '0606060606',
        ]);
        return view('admin.users.form', [
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserFormRequest $request)
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $user = User::create($request->validated());
        return to_route('admin.user.index')->with('success', 'L\'utilisateur à été créer');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        return view('admin.users.form' , [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserFormRequest $request, User $user)
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $user->update($request->validated());
        return to_route('admin.user.index')->with('success', 'L\'utilisateur a bien été modifié');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function unban(User $user)
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $user->is_ban = false;
        $user->save();

        return to_route('admin.user.index')->with('success', 'Utilisateur débanni avec succès');
    }

    public function ban(User $user)
    {
        $user = auth()->user();
        if(!$user->is_admin){
            return redirect()->route('home');
        }
        $user->is_ban = true;
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Utilisateur banni avec succès');
    }
}
