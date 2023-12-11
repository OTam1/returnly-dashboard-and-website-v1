<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Import the Item model
use App\Models\Place; // Import the Place model
use App\Models\Category; // Import the Place model
use App\Models\City; // Import the Place model
use App\Models\SubCategory;
use App\Models\User;

use Auth;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $items = Item::with('user')->get(); // Eager load the 'user' relationship

        return view('admin.requested-items', ['items' => $items]);
    }

    public function show($item)
    {
        $item = Item::findOrFail($item); // Retrieve the item by its ID
        return view('admin.show-requested-items', ['item' => $item]);
    }

    public function corpratorindex()
    {
        // Retrieve items where 'user_id' is in the 'place' table where 'place_id' is in the 'item' table
        $corporator_id = Auth::user()->id;

        // Use the relationships to fetch the items
        $items = Item::whereHas('place.user', function ($query) use ($corporator_id) {
            $query->where('id', $corporator_id);
        })->get();
        // $items = Item::with('user')->get(); // Eager load the 'user' relationship

        return view('corprator.requested-items', ['items' => $items]);
    }

    public function corpratorshow($item)
    {
        $item = Item::findOrFail($item); // Retrieve the item by its ID
        return view('corprator.show-requested-items', ['item' => $item]);
    }

    public function corpratorstoreitems()
    {
        $corporator_id = Auth::user()->id;
    
        // Get places for the authenticated user
        $places = Place::where('user_id', $corporator_id)->get();
        if ($places->isEmpty()) {
            return response()->json(['message' => __('dashboard.no-places-found')]);
        }
    
        // Assuming you want to get the city for the first place in the collection
        $firstPlace = $places->first();
        $cities = City::where('id',$firstPlace->city_id)->get();

        // Check if the city was found
        if (!$cities) {
            return response()->json(['message' => __('dashboard.city-not-found')]);
        }

        // $cities = City::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();

        return view('corprator.store-items',['cities' => $cities, 'categories' => $categories]);
    }
    public function getSubCategories(Request $request)
    {
        $categoryId = $request->input('category_id');
        $subCategories = SubCategory::where('category_id', $categoryId)->where('status', 1)->pluck('sub_category_name_en', 'id');

        return response()->json($subCategories);
    }
    public function getPlaces(Request $request)
    {
        // Get the authenticated user's ID
        $corporator_id = Auth::user()->id;
    
        // Get places for the authenticated user
        $places = Place::where('user_id', $corporator_id)->pluck('place_name_en', 'id');
    
        // Check if places were found
        if ($places->isEmpty()) {
            return response()->json(['message' => __('dashboard.no-places-found')]);
        }
    
        return response()->json($places);
    }
    

}
