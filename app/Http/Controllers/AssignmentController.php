<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;
use App\Models\Place;

class AssignmentController extends Controller
{
    public function index()
{
    $users = User::where('role_id', 2)->get();
    $cities = City::where('status', 1)->get();

    return view('admin.assign-corprators-to-place', compact('users', 'cities'));
}
public function assign(Request $request)
{
    // Validate the form data
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'city_id' => 'required|exists:cities,id',
        'place_id' => 'required|exists:places,id',
    ]);

    // Get the selected user, city, and place
    $userId = $request->input('user_id');
    $placeId = $request->input('place_id');

    // Load the user, city, and place models
    $user = User::find($userId);
    $place = Place::find($placeId);

    // Assign the user to the place
    $place->user_id = $userId;
    $place->save();

    // Optionally, you can add a success message and redirect back to the form
    return redirect()->route('admin.corprators')->with('success', 'User assigned to place successfully');
}

}
