<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Import the Place model
use App\Models\City; // Import the Place model
use App\Models\SubCategory;
use App\Models\Place;

class UserDashboardController extends Controller
{
    public function index()
    {
        $cities = City::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        
        return view('user.dashboard', ['cities' => $cities, 'categories' => $categories]);
    }
    public function getSubCategories(Request $request)
    {
        $categoryId = $request->input('category_id');
        $subCategories = SubCategory::where('category_id', $categoryId)->where('status', 1)->pluck('sub_category_name_en', 'id');

        return response()->json($subCategories);
    }
    public function getPlaces(Request $request)
    {
        $cityId = $request->input('city_id');
        $places = Place::where('city_id', $cityId)->where('status', 1)->pluck('place_name_en', 'id');

        return response()->json($places);
    }

}
