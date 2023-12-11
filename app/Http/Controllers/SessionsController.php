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
                    return redirect('dashboard')->with(['success' => __('dashboard.logged-in')]);
                } else {
                    Auth::logout();
                    return back()->withErrors(['email' => __('dashboard.account-disabled')]);
                }
            } else {
                Auth::logout();
                return back()->withErrors(['email' => __('dashboard.no-permission')]);
            }
        } else {
            return back()->withErrors(['email' => __('dashboard.invalid-credentials')]);
        }
    }
    
    public function destroy()
    {
        Auth::logout();

        return redirect('/login')->with(['success' => __('dashboard.logged-out')]);
    }
}
