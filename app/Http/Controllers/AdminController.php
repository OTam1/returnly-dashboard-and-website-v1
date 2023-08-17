<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $credentials['role_id'] = 1; // Assuming administrators have role_id = 1

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended(route('admin.dashboard')); // Use route() to generate the correct URL
        } else {
            // Authentication failed
            return back()->withErrors(['email'=>'Email or password invalid.']);
        }
    }
    public function logout()
    {
        Auth::guard('web')->logout(); // Use the web guard here
        return redirect()->route('admin.login')->with(['success' => 'You\'ve been logged out.']);
    }
}
