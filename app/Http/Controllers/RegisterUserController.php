<?php
// resource: app/Http/Controllers/RegisterUserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $attributes = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'   => ['required', Password::min(6), 'confirmed'],
        ]);

        // Create a new user record in the database
        $user = User::create([
            'first_name' => $attributes['first_name'],
            'last_name'  => $attributes['last_name'],
            'email'      => $attributes['email'],
            'password'   => Hash::make($attributes['password']),
        ]);

        // Log the user in
        Auth::login($user);

        // Add a confirmation message to the session
        $request->session()->flash('success', 'Registration successful!');

        // Redirect back to the jobs index with a success message
        return redirect('/jobs');
    }
}
