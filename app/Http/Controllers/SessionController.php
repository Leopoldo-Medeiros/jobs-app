<?php
// resource: app/Http/Controllers/SessionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        // Step #1. Validate
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Step #2. Attempt to authenticate the user
        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials do not match our records.'
            ]);
        }

        // Step #3. Regenerate the session
        // Basically, you are authenticated for this application in that browser.
        // If a hacker inaccessible your session, they can impersonate you. So, you need to regenerate the session to prevent this.

        // A good way to protect your application from session fixation attacks is to regenerate the session ID every time a user logs in.
        request()->session()->regenerate();

        // Step #4. Redirect the user
        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
