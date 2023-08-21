<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory; // Import the Place model
use App\Models\Category; // Import the Place model

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::all();
        $subCategories = SubCategory::with('user')->get(); // Eager load the 'user' relationship
        $subCategories = SubCategory::with('category')->get(); // Eager load the 'user' relationship

        return view('admin.sub_categories', ['subCategories' => $subCategories]);
    }
    public function form()
    {
        $sub_categories = Category::where('status', 1)->get(); // Eager load the 'user' relationship
        
        return view('admin.add-sub_categories',['sub_categories' => $sub_categories]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'sub_category_name_en' => 'required',
            'sub_category_name_ar' => 'required',
        ]);

        // Create a new place record
        SubCategory::create([
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
            'sub_category_name_en' => $request->input('sub_category_name_en'),
            'sub_category_name_ar' => $request->input('sub_category_name_ar'),
            'status' => $request->input('status', true), // Default to true if not provided
        ]);


        return redirect()->route('sub_categories.index')
            ->with('success', 'Place created successfully');
    }

    public function editStatus(Request $request, $id)
    {
        $sub_categories = SubCategory::findOrFail($id); // Find the place by ID
    
            // Toggle the status
            $sub_categories->update([
                'status' => !$sub_categories->status,
            ]);
    
        return redirect()->route('sub_categories.index')->with('success', 'Place status updated successfully!');
    }
    
}
