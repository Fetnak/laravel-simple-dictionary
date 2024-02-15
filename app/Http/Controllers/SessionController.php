<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($attributes)) {
            return back()->withErrors(['username' => 'Wrong login and/or password.']);
        }

        session()->regenerate();
        return redirect('/')->with('success', 'Welcome Back!');

    }
    public function create()
    {
        return view('user.login');
    }
}
