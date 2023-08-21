<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\UserDashboardController;


use App\Models\Item;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//admin auth routes

Route::middleware(['role:1'])->prefix('admin')->group(function () {

	//Pages
	Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

	//cities
	Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
	Route::get('/cities-add', [CityController::class, 'form'])->name('cities.form');
	Route::post('/cities', [CityController::class, 'store'])->name('cities.store');			
	Route::get('cities/{id}/edit', [CityController::class, 'edit'])->name('cities.edit');

	//places
	Route::get('/places', [PlaceController::class, 'index'])->name('places.index');
	Route::get('/places-add', [PlaceController::class, 'form'])->name('places.form');
	Route::post('/places', [PlaceController::class, 'store'])->name('places.store');
	Route::get('/places/{id}/edit-status', [PlaceController::class, 'editStatus'])->name('places.editStatus');

	//categories
	Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
	Route::get('/categories-add', [CategoryController::class, 'form'])->name('categories.form');
	Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
	Route::get('/categories/{id}/edit', [CategoryController::class, 'editStatus'])->name('categories.editStatus');

	//sub_categories
	Route::get('/sub_categories', [SubCategoryController::class, 'index'])->name('sub_categories.index');
	Route::get('/sub_categories-add', [SubCategoryController::class, 'form'])->name('sub_categories.form');
	Route::post('/sub_categories', [SubCategoryController::class, 'store'])->name('sub_categories.store');
	Route::get('/sub_categories/{id}/edit', [SubCategoryController::class, 'editStatus'])->name('sub_categories.editStatus');

	//users
	Route::get('/administrators', [AdminUsersController::class, 'administrators'])->name('admin.administrators');
	Route::get('/users', [AdminUsersController::class, 'users'])->name('admin.users');
	Route::get('/corprators', [AdminUsersController::class, 'corprators'])->name('admin.corprators');
	Route::get('/disableuser/{id}/edit', [AdminUsersController::class, 'EditStatus'])->name('admin.EditStatus');

	//items
	Route::get('/requestedItems', [ItemsController::class, 'index'])->name('items.index');
	Route::get('/requested-item/{item}', [ItemsController::class, 'show'])->name('adminitems.show');

	//profile, logout
	Route::get('/user-profile', [InfoUserController::class, 'admincreate']);
	Route::post('/user-profile', [InfoUserController::class, 'adminstore']);		
	Route::post('admin/logout',[AdminController::class, 'logout'])->name('admin.logout');
});

//user auth routes
Route::middleware(['role:3'])->group(function () {

	Route::post('/submit', [ItemController::class, 'create'])->name('items.create');

	Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
	Route::get('get-sub-categories',[UserDashboardController::class, 'getSubCategories'])->name('user.getSubCategories');
	Route::get('get-places', [UserDashboardController::class, 'getPlaces'])->name('user.getPlaces');
	
	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('item-requests', function () {
		$userItems = Item::where('user_id', Auth::user()->id)->get();
		return view('item.list', ['items' => $userItems]);
	})->name('user-management');
	
	Route::get('item-requests/{item}', function ($item) {
		$item = Item::findOrFail($item); // Retrieve the item by its ID
		return view('item.show', ['item' => $item]);
	})->name('items.show');
	
	
	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('user.dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
	//user dashboard
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

	//admin dashboard
	Route::get('admin/login',  [AdminController::class, 'showLoginForm'])->name('admin.login');
	Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

});
//web page
Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
Route::get('/', function () {
	return view('landingpage');
});
Route::post('/joinus', [ContactController::class, 'joinUs'])->name('joinus');
Route::post('/contactus', [ContactController::class, 'contactUs'])->name('contactus');	
