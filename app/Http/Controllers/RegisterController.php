<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        return view('users.register', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        //Vérifier si l'email existe déjà
        $emailExiste = User::where('email', $request->email)
        ->exists();

        if($emailExiste){
            return redirect()->back()->withErrors(['error' => '❌Cet email existe déjà !']);
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password  = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        return to_route('users.index')->with('status', 'Utilisateur créer avec succès');
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
        $user = User::find($id);

        return view('users.register', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        //Vérifier si l'email existe déjà
        $emailExiste = User::where('email', $request->email)
            ->exists();

        if($emailExiste){
            return redirect()->back()->withErrors(['error' => '❌Cet email existe déjà !']);
        }

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();
        return to_route('users.index')->with('status', 'Utilisateur modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);

        return to_route('users.index')->with('status', 'Utilisateur supprimé avec succès');
    }
}
