<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisteredUserController extends Controller
{
    // Register
    public function create()
    {
        return view('auth.register');
    }

    // Login
    public function store()
    {
        // validate
        request()->validate([
            'first_name' => ['required', 'max:255', 'min:3'],
            'last_name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(8), 'confirmed'], // password_confirmation
        ]);
        // create user
        $user = User::create([
            'name' => request('first_name') . ' ' . request('last_name'),
            'email' => request('email'),
            'password' => request('password'),
        ]);
        // login user
        Auth::login($user);

        // redirect
        return redirect('/jobs');
    }
}
