<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Import the Place model

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', ['categories' => $categories]);
    }
    public function form()
    {
        $categories = Category::with('user')->get(); // Eager load the 'user' relationship

        return view('admin.add-category', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required',
            'category_name_en' => 'required',
            'category_name_ar' => 'required',
        ]);

        // Create a new place record
        Category::create([
            'user_id' => $request->input('user_id'),
            'category_name_en' => $request->input('category_name_en'),
            'category_name_ar' => $request->input('category_name_ar'),
            'status' => $request->input('status', true), // Default to true if not provided
        ]);


        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully');
    }
    public function editStatus(Request $request, $id)
    {
        // Validate the request data here as needed

        $category = Category::findOrFail($id);
        $category->update([
            'status' => !$category->status,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category status updated successfully!');
    }


}
