<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the Place model

class AdminUsersController extends Controller
{
    public function administrators()
    {
        $administrators = User::where('role_id', 1)->get();

        // Now you can return the administrators to your view or perform any other actions.
        return view('admin.administrators', compact('administrators'));
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

    public function EditStatus(Request $request, $id)
    {
        $administrators = User::findOrFail($id);
        $wht= $administrators->update([
            'status' => !$administrators->status,
        ]);

        return redirect()->back()->with('success', 'Category status updated successfully!');
    }
}
