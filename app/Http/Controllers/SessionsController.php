<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($attributes)) {
            $user = Auth::user();
            if ($user->role_id === 3) {
                if ($user->status === 1) {
                    session()->regenerate();
                    return redirect('dashboard')->with(['success' => 'You are logged in.']);
                } else {
                    Auth::logout();
                    return back()->withErrors(['email' => 'Your account is disabled.']);
                }
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'You do not have permission to log in.']);
            }
        } else {
            return back()->withErrors(['email' => 'Email or password invalid.']);
        }
    }
    
    public function destroy()
    {
        Auth::logout();

        return redirect('/login')->with(['success' => 'You\'ve been logged out.']);
    }
}
