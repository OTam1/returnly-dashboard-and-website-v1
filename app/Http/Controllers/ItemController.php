<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function create(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'user_id' => 'required',
            'item_name' => 'required|string',
            'color' => 'required|string',
            'city_id'=> 'required',
            'city' => 'required|string',
            'place_id' => 'required',
            'place' => 'required|string',
            'category_id' => 'required',
            'category' => 'required|string',
            'sub_category_id' => 'required',
            'sub_category' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'nullable|string',
            'status' =>'required',
            // 'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('item_images', 'public'); // 'item_images' is a directory under 'public/storage'
            $validatedData['image'] = $imagePath;
        }
                        
        // Create a new item
        Item::create($validatedData);

        return redirect()->back()->with('success', 'Find item request created successfully!');
    }
}
