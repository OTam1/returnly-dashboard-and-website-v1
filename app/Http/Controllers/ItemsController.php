<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Import the Place model

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

}
