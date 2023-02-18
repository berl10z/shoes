<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerShow()
    {
        return view('auth.register');
    }
    public function register(Request $r)
    {
        $data = $r->validate([
            'email'     => 'required|max:255|unique:users',
            'password'  => 'required|confirmed',
            'rules'     => 'accepted'
        ]);

        User::create($data);

        if (auth()->attempt([
            'email'     => $data['email'],
            'password'  => $data['password']
        ])) {
            return to_route('home');
        }
        return back()->withErrors(['error' => 'Повторите вход']);
    }
    public function loginShow()
    {
        return view('auth.login');
    }
    public function login(Request $r)
    {
        $data = $r->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if(auth()->attempt($data)){
            return to_route('home');
        }
        return back()->withErrors(['error' => 'Неверный логин или пароль']);
    }
    public function logout()
    {
        auth()->logout();
        return to_route('home');
    }
}
