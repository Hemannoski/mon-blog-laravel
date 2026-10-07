<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showSignup(){
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.register');
    }


    public function signup(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Mail::to($user->email)->send(new WelcomeMail($user));

        return back()->with('success', 'Incription effectuée avec succes, un email de bienvenue vous a été envoyé');
    }

    public function showFormLogin(){
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email ou le mot de passe ne correspondent pas'
        ]);
    }

    public function logout(Request $request){
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate(); #permet d'invalider la session
            $request->session()->regenerateToken(); #permet de régénérer le token csrf
            return redirect()->route('login')->with('success', 'Vous avez été déconnecté avec succès!');
        }
    }
}
