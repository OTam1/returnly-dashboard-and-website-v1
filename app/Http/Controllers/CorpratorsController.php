<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Place;
use Auth;

class CorpratorsController extends Controller
{
    public function index()
    {
        $corporator_id = Auth::user()->id;

        // Retrieve places for the authenticated user
        $places = Place::where('user_id', $corporator_id)->get();
        
        // Get the place IDs associated with the user
        $placeIds = $places->pluck('id');
        
        // Retrieve items where 'place_id' is in the $placeIds array
        $items = Item::whereIn('place_id', $placeIds)->get();
        
        // Items count
        $totalItems = $items->count();
        $todayItemsCount = $items->filter(function ($item) {
            return $item->created_at->isToday();
        })->count();
        
        $todayItemsActionedCount = $items->filter(function ($item) {
            return $item->updated_at->isToday();
        })->count();
        
        $pendingCount = $items->where('status', 'Pending')->count();
        $waitingCount = $items->where('status', 'Waiting for payment')->count();
        $deliveredCount = $items->where('status', 'Delivered')->count();
        $cancelledCount = $items->where('status', 'Cancelled')->count();
        
        // Pass the data to the view
        return view('corprator.dashboard', [
            'totalItems' => $totalItems,
            'todayItemsCount' => $todayItemsCount,
            'todayItemsActionedCount' => $todayItemsActionedCount,
            'pendingCount' => $pendingCount,
            'waitingCount' => $waitingCount,
            'deliveredCount' => $deliveredCount,
            'cancelledCount' => $cancelledCount,
        ]);
        
    }

    public function showLoginForm()
    {
        return view('corprator.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $credentials['role_id'] = 2; // Assuming administrators have role_id = 1
        $credentials['status'] = 1;
        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended(route('corprator.dashboard')); // Use route() to generate the correct URL
        } else {
            // Authentication failed
            return back()->withErrors(['email'=> __('dashboard.invalid-credentials')]);
        }
    }
    public function logout()
    {
        Auth::guard('web')->logout(); // Use the web guard here
        return redirect()->route('corprator.login')->with(['success' => __('dashboard.logged-out')]);
    }

    public function itemstatus(Request $request, $item, $status)
    {

        // Assuming you have an Item model
        $item = Item::findOrFail($item);
        $item->status = $status;
        $item->save();

        // You can add further logic, such as redirects or responses
        return redirect()->back()->with('success', __('dashboard.status-updated-success'));
    }

}
