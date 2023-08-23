<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the Place model
use App\Models\City;
use App\Models\Place;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    public function administrators()
    {
        $administrators = User::where('role_id', 1)->get();

        // Now you can return the administrators to your view or perform any other actions.
        return view('admin.administrators', compact('administrators'));
    }
    public function AddAdministratorsForm(Request $request)
    {
        return view('admin.add-administrators');
    }

    public function AddAdministrators(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|string',
            'password' => 'required|string',
            'phone' => 'nullable',
            'location' => 'nullable',
            'about_me' => 'nullable',
        ]);

        // Hash the password
        $hashedPassword = Hash::make($validatedData['password']);

        $additionalData = [
            'role_id' => 1,
            'status' => true,
        ];

        // Replace the plain text password with the hashed one
        $validatedData['password'] = $hashedPassword;

        $userData = array_merge($validatedData, $additionalData);
        User::create($userData);

        // Now you can return the administrators to your view or perform any other actions.
        return redirect()->route('admin.administrators')->with('success', 'administrator user created successfully!');
    }

    public function users()
    {
        $users = User::where('role_id', 3)->get();

        // Now you can return the administrators to your view or perform any other actions.
        return view('admin.users', compact('users'));
    }

    public function corprators()
    {
        $corprators = User::where('role_id', 2)->get();

        // Now you can return the administrators to your view or perform any other actions.
        return view('admin.corprators', compact('corprators'));
    }
    public function AddCorpratorsForm(Request $request)
    {
        $cities = City::where('status', 1)->get();

        // Now you can return the administrators to your view or perform any other actions.
        return view('admin.add-corprators', compact('cities'));
    }

    public function AddCorprators(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|string',
            'password' => 'required|string',
            'phone' => 'nullable',
            'location' => 'nullable',
            'about_me' => 'nullable',
        ]);

        // Hash the password
        $hashedPassword = Hash::make($validatedData['password']);

        $additionalData = [
            'role_id' => 2,
            'status' => true,
        ];

        // Replace the plain text password with the hashed one
        $validatedData['password'] = $hashedPassword;

        $userData = array_merge($validatedData, $additionalData);

        $corporate = User::create($userData);
        Place::where('id', $request->place_id)->update(['user_id' => $corporate->id]);

        // Now you can return the administrators to your view or perform any other actions.
        return redirect()->route('admin.corprators')->with('success', 'Corprator user created successfully!');
    }
    public function getPlaces(Request $request)
    {
        $cityId = $request->input('city_id');
        $places = Place::where('city_id', $cityId)->where('status', 1)->pluck('place_name_en', 'id');

        return response()->json($places);
    }

    public function EditStatus(Request $request, $id)
    {
        $administrators = User::findOrFail($id);
        $wht = $administrators->update([
            'status' => !$administrators->status,
        ]);

        return redirect()->back()->with('success', 'status updated successfully!');
    }
}