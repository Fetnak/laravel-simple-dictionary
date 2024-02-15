<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create() {
        return view('user.register');
    }

    public function store() {
        $user = User::create(request()->validate([
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'password' => 'required'
        ]));
        auth()->login($user);

        return redirect('/')->with('success', 'Account has been registered.');
    }
}
