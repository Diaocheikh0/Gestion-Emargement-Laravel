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

    public function dologin(LoginRequest $request){
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('listUsers'));
        }

        return redirect()->intended(route('login'))->withErrors([
            'email' => 'Email/Mot de passe invalide',

        ])->onlyInput('email');
    }
}
