<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Items count
        $totalItems = Item::count();
        $todayItemsCount = Item::whereDate('created_at', now())->count();
        $todayItemsActionedCount = Item::whereDate('updated_at', now())->count();
        $pendingCount = Item::where('status', 'Pending')->count();
        $waitingCount = Item::where('status', 'Waiting for payment')->count();
        $deliveredCount = Item::where('status', 'Delivered')->count();
        $cancelledCount = Item::where('status', 'Cancelled')->count();
        
        // Users count
        $totalUsers = User::where('role_id', 3)->count();
        $todayUsersCount = User::where('role_id', 3)
            ->whereDate('created_at', now())
            ->count();
        $todayUsersloginCount = User::where('role_id', 3)
            ->whereDate('updated_at', now())
            ->count();
        
        // Pass the data to the view
        return view('admin.dashboard', [
            'totalItems' => $totalItems,
            'todayItemsCount' => $todayItemsCount,
            'totalUsers' => $totalUsers,
            'todayUsersCount' => $todayUsersCount,
            'todayUsersloginCount' => $todayUsersloginCount,
            'todayItemsActionedCount' => $todayItemsActionedCount,
            'pendingCount' => $pendingCount,
            'waitingCount' => $waitingCount,
            'deliveredCount' => $deliveredCount,
            'cancelledCount' => $cancelledCount,
        ]);
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $credentials['role_id'] = 1; // Assuming administrators have role_id = 1
        $credentials['status'] = 1;
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
