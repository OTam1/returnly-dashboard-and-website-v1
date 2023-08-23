<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Import the Item model
use App\Models\Place; // Import the Place model

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


}
