<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    public function dologin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return to_route('users.index');
            } elseif (Auth::user()->role == 'gestionnaire') {
                return to_route('cours.index');
            } elseif (Auth::user()->role == 'professeur') {
                return to_route('emargements.create');
            }

            return to_route('users.index');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Email/Mot de passe invalide',
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();

        return view('login');
    }
}
