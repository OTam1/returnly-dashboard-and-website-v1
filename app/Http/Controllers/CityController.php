<?php

namespace App\Http\Controllers;
use App\Models\City; // Make sure to import the City model at the top
use App\Models\User; // Make sure to import the City model at the top


use Illuminate\Http\Request;

class CityController extends Controller
{
    
    public function index()
    {
        $cities = City::all();
        $cities = City::with('user')->get(); // Eager load the 'user' relationship

        return view('admin.cities', ['cities' => $cities]);
    }
    public function form()
    {
        return view('admin.add-city');
    }

    public function store(Request $request)
    {
        // Validate the request data, you can add validation rules here
        $request->validate([
            'city_name_en' => 'required|string',
            'city_name_ar' => 'required|string',
            'status' => 'boolean',
        ]);

        // Create a new city record
        City::create([
            'user_id' => $request->input('user_id'),
            'city_name_en' => $request->input('city_name_en'),
            'city_name_ar' => $request->input('city_name_ar'),
            'status' => $request->input('status', true), // Default to true if not provided
        ]);

        return redirect()->route('cities.index')->with('success', 'City created successfully!');
    }

    public function edit(Request $request, $id)
    {
        $city = City::findOrFail($id);

        // Toggle the status
        $city->update([
            'status' => !$city->status,
        ]);

        return redirect()->route('cities.index')->with('success', 'City status updated successfully');
    }

}
