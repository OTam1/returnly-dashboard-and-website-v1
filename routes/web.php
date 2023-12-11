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
use App\Http\Controllers\CorpratorsController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\LanguageController;

use App\Models\Item;
use App\Models\StoreItem;

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
	Route::get('/administrators-add', [AdminUsersController::class, 'AddAdministratorsForm'])->name('admin.AddAdministratorsForm');
	Route::post('/administrators', [AdminUsersController::class, 'AddAdministrators'])->name('admin.AddAdministrators');

	Route::get('/users', [AdminUsersController::class, 'users'])->name('admin.users');
	
	Route::get('/corporators', [AdminUsersController::class, 'corprators'])->name('admin.corprators');
	Route::get('/corporators-add', [AdminUsersController::class, 'AddCorpratorsForm'])->name('admin.AddCorpratorsForm');
	Route::post('/corporators', [AdminUsersController::class, 'AddCorprators'])->name('admin.AddCorprators');
	Route::get('/get-places',[AdminUsersController::class, 'getPlaces'])->name('admin.getPlaces');

	Route::get('/disableuser/{id}/edit', [AdminUsersController::class, 'EditStatus'])->name('admin.EditStatus');

	Route::get('/assign-corprator-to-place', [AssignmentController::class, 'index'])->name('admin.AssignCorpratorToPlaceForm');
	Route::post('/assign-corprator-to-place', [AssignmentController::class, 'assign'])->name('admin.AssignCorpratorToPlace');

	//items
	Route::get('/requestedItems', [ItemsController::class, 'index'])->name('items.index');
	Route::get('/requested-item/{item}', [ItemsController::class, 'show'])->name('adminitems.show');
	Route::get('/itemstatus/{item}/{status}', [AdminController::class, 'itemstatus'])->name('admin.itemstatus');

	//profile, logout
	Route::get('/user-profile', [InfoUserController::class, 'admincreate']);
	Route::post('/user-profile', [InfoUserController::class, 'adminstore']);		
	Route::post('admin/logout',[AdminController::class, 'logout'])->name('admin.logout');
});

//corprators auth routes 
Route::middleware(['role:2'])->prefix('corporators')->group(function () {

	//Pages
	Route::get('dashboard', [CorpratorsController::class, 'index'])->name('corprator.dashboard');

	//items
	Route::get('/requestedItems', [ItemsController::class, 'corpratorindex'])->name('corprator.corpratorindex');
	Route::get('/requested-item/{item}', [ItemsController::class, 'corpratorshow'])->name('corprator.corpratorshow');
	Route::get('/itemstatus/{item}/{status}', [CorpratorsController::class, 'itemstatus'])->name('corprator.itemstatus');

	Route::get('/storeItems', [ItemsController::class, 'corpratorstoreitems'])->name('corprator.corpratorstoreitems');
	Route::post('/submit-store-item', [ItemController::class, 'store'])->name('corprator.store');

	Route::get('stored-items', function () {
		$userItems = StoreItem::where('user_id', Auth::user()->id)->get();
		return view('corprator.storedItems.list', ['items' => $userItems]);
	})->name('stored-items.list');
	
	Route::get('stored-items/{item}', function ($item) {
		$item = StoreItem::findOrFail($item); // Retrieve the item by its ID
		return view('corprator.storedItems.show', ['item' => $item]);
	})->name('stored-items.show');

	Route::get('get-sub-categories',[ItemsController::class, 'getSubCategories'])->name('corprator.getSubCategories');
	Route::get('get-places', [ItemsController::class, 'getPlaces'])->name('corprator.getPlaces');

	

	//profile, logout
	Route::get('/user-profile', [InfoUserController::class, 'corpratorcreate'])->name('corprator.corpratorcreate');
	Route::post('/user-profile', [InfoUserController::class, 'corpratorstore'])->name('corprator.corpratorstore');		
	Route::post('/logout',[CorpratorsController::class, 'logout'])->name('corprator.logout');
});


//user auth routes
Route::middleware(['role:3'])->group(function () {

	Route::post('/submit', [ItemController::class, 'create'])->name('items.create');

	Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
	Route::get('get-sub-categories',[UserDashboardController::class, 'getSubCategories'])->name('user.getSubCategories');
	Route::get('get-places', [UserDashboardController::class, 'getPlaces'])->name('user.getPlaces');
	
	// Route::get('profile', function () {
	// 	return view('profile');
	// })->name('profile');

	// Route::get('rtl', function () {
	// 	return view('rtl');
	// })->name('rtl');

	Route::get('item-requests', function () {
		$userItems = Item::where('user_id', Auth::user()->id)->get();
		return view('user.item.list', ['items' => $userItems]);
	})->name('user-management');
	
	Route::get('item-requests/{item}', function ($item) {
		$item = Item::findOrFail($item); // Retrieve the item by its ID
		return view('user.item.show', ['item' => $item]);
	})->name('items.show');
	
	
	// Route::get('tables', function () {
	// 	return view('tables');
	// })->name('tables');

    // Route::get('virtual-reality', function () {
	// 	return view('virtual-reality');
	// })->name('virtual-reality');

    // Route::get('static-sign-in', function () {
	// 	return view('static-sign-in');
	// })->name('sign-in');

    // Route::get('static-sign-up', function () {
	// 	return view('static-sign-up');
	// })->name('sign-up');

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


	Route::get('corporators/login',  [CorpratorsController::class, 'showLoginForm'])->name('corprator.login');
	Route::post('corporators/login', [CorpratorsController::class, 'login'])->name('corprator.login.submit');

	Route::get('item/{item}', function ($item) {
		$item = StoreItem::findOrFail($item); // Retrieve the item by its ID
		return view('guest.item.show', ['item' => $item]);
	})->name('guest.items.show');

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
Route::get('/switch-language/{locale}',  [LanguageController::class, 'switchLanguage'])->name('switch.language');
Route::get('/terms-and-conditions', function () {return view('terms-and-conditions');})->name('terms-and-conditions');
