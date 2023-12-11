<?php

namespace App\Http\Controllers;
use App\Models\Place; // Import the Place model
use App\Models\City; // Import the Place model
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::all(); // Retrieve all places from the database
        $places = Place::with('user')->get(); // Eager load the 'user' relationship
        $places = Place::with('city')->get(); // Eager load the 'user' relationship

        return view('admin.places', ['places' => $places]);
    }

    public function form()
    {
        $cities = City::where('status',1)->get(); // Eager load the 'user' relationship
        
        return view('admin.add-place',['cities' => $cities]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required',
            'city_id' => 'required',
            'place_name_en' => 'required',
            'place_name_ar' => 'required',
        ]);

        // Create a new place record
        Place::create([
            'user_id' => $request->input('user_id'),
            'city_id' => $request->input('city_id'),
            'place_name_en' => $request->input('place_name_en'),
            'place_name_ar' => $request->input('place_name_ar'),
            'status' => $request->input('status', true), // Default to true if not provided
        ]);


        return redirect()->route('places.index')
            ->with('success', __('dashboard.place-created-success'));
    }

    public function editStatus(Request $request, $id)
{
    $place = Place::findOrFail($id); // Find the place by ID

        // Toggle the status
        $place->update([
            'status' => !$place->status,
        ]);

    return redirect()->route('places.index')->with('success', __('dashboard.place-status-updated-success'));
}

}
