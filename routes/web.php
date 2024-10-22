<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RatingController;
use App\Http\Controllers\AdminDashboardController;


use App\Http\Controllers\CustomerController;

use App\Http\Controllers\Admin\UserManagementController;



use App\Http\Controllers\Backend\ProductController;


use App\Http\Controllers\Backend\CategoryController;


Route::get('/', function () {
    return view('frontend.index');
})->name('mainSite');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::resource('/adminpanel/customers', CustomerController::class);
    Route::post('/adminpanel/customers2', [CustomerController::class, 'input'])->name('customers2.input');
    Route::get('/adminpanel/customers2', [CustomerController::class, 'input'])->name('customers2.input');
    Route::post('/adminpanel/customers2', [CustomerController::class, 'input2'])->name('customers2.input2');
    Route::get('/customers/user/{userId}', [CustomerController::class, 'showCustomerByUserId'])->name('customers.showByUserId');

});
Route::get('/n', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/approve', [UserManagementController::class, 'approve'])->name('users.approve');
    Route::patch('/users/{user}/disapprove', [UserManagementController::class, 'disapprove'])->name('users.disapprove');
    Route::get('/user/{userId}', [UserManagementController::class, 'showByUserId'])->name('users.showByUserId');



    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::prefix('backend')->group(function() {
    Route::resource('products', ProductController::class);


    Route::resource('categories', CategoryController::class);



});







// المجموعة التي تشمل كل المسارات الخاصة بالإدارة
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/approve', [UserManagementController::class, 'approve'])->name('users.approve');
    Route::patch('/users/{user}/disapprove', [UserManagementController::class, 'disapprove'])->name('users.disapprove');
});













Route::get('/admin/approve-users', [AdminDashboardController::class, 'approveUsers'])->name('admin.approve_users');
Route::post('/admin/approve-user/{id}', [AdminDashboardController::class, 'approveUser'])->name('admin.approve_user');





Route::get('/approval-required', function () {
    return view('auth.approval_required');
})->name('approval_required');






/////////////////////****************/////////////////////////*********////// */ */
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FoodOrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieReviewController;
use App\Http\Controllers\SeatReservationController;

Route::get('/users/employees', [EmployeeController::class, 'employees'])->name('users.employees');

// الغرف
Route::resource('rooms', RoomController::class);

// المطاعم
Route::resource('restaurants', RestaurantController::class);

// المسابح
Route::resource('pools', PoolController::class);

// القوائم
Route::resource('menus', MenuController::class);

// الطلبات
Route::resource('food_orders', FoodOrderController::class);

// الحجوزات
Route::resource('reservations', ReservationController::class);




////////////////// cinema departement
Route::resource('movies', MovieController::class);
Route::resource('seat-reservations', SeatReservationController::class);
Route::resource('movie-reviews', MovieReviewController::class);







































