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

use App\Models\Item;
use App\Models\User; 

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

	Route::get('dashboard', function () {
		//items count
		$totalItems = Item::count(); // Count total items
		$todayItemsCount = Item::whereDate('created_at', now())->count(); // Count items added today
		$todayItemsActionedCount = Item::whereDate('updated_at', now())->count(); // Count items added today
		$pendingCount = Item::where('status', 'Pending')->count(); // Count items with status "Pending"
		$waitingCount = Item::where('status', 'Waiting for payment')->count(); // Count items with status "Waiting for payment"
		$deliveredCount = Item::where('status', 'Delivered')->count(); // Count items with status "Delivered"
		$cancelledCount = Item::where('status', 'Cancelled')->count(); // Count items with status "Cancelled"
	
		//usercount
		$totalUsers = User::where('role_id', 3)->count(); // Count total users with role_id = 3
		$todayUsersCount = User::where('role_id', 3)
			->whereDate('created_at', now())
			->count(); // Count users added today with role_id = 3
		$todayUsersloginCount = User::where('role_id', 3)
		->whereDate('updated_at', now())
		->count(); // Count users added today with role_id = 3

		return view('admin.dashboard', [
			'totalItems' => $totalItems,
			'todayItemsCount' => $todayItemsCount,
			'totalUsers' => $totalUsers,
			'todayUsersCount' => $todayUsersCount,
			'todayUsersloginCount' => $todayUsersloginCount,
			'todayItemsActionedCount' =>$todayItemsActionedCount,	
			'pendingCount' => $pendingCount,
			'waitingCount' => $waitingCount,
			'deliveredCount' => $deliveredCount,
			'cancelledCount' => $cancelledCount,]);})->name('admin.dashboard');

	Route::get('/user-profile', [InfoUserController::class, 'admincreate']);
	Route::post('/user-profile', [InfoUserController::class, 'adminstore']);		
	Route::post('admin/logout',[AdminController::class, 'logout'])->name('admin.logout');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');
});

//user auth routes
Route::middleware(['role:3'])->group(function () {

	Route::post('/submit', [ItemController::class, 'create'])->name('items.create');

	Route::get('dashboard', function () {
		return view('user.dashboard');
	})->name('dashboard');

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
