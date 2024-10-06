<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RatingController;
use App\Http\Controllers\AdminDashboardController;


use App\Http\Controllers\CustomerController;

use App\Http\Controllers\Admin\UserManagementController;



use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\FacebookPageController;
use App\Http\Controllers\Backend\InstagramAccountController;
use App\Http\Controllers\Backend\YouTubeChannelController;

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\RecommendationController;

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

    Route::resource('facebook_pages', FacebookPageController::class);
    Route::post('facebook_pages/filter', [FacebookPageController::class, 'filter'])->name('facebook_pages.filter');



    Route::resource('instagram_accounts', InstagramAccountController::class);
    Route::post('instagram_accounts/filter', [InstagramAccountController::class, 'filter'])->name('instagram_accounts.filter');

    Route::resource('youtube_channels', YouTubeChannelController::class);
    Route::post('youtube_channels/filter', [YouTubeChannelController::class, 'filter'])->name('youtube_channels.filter');

    Route::resource('categories', CategoryController::class);



});



Route::post('/recommend', [RecommendationController::class, 'recommend'])->name('recommendations.recommend');














































// المجموعة التي تشمل كل المسارات الخاصة بالإدارة
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/approve', [UserManagementController::class, 'approve'])->name('users.approve');
    Route::patch('/users/{user}/disapprove', [UserManagementController::class, 'disapprove'])->name('users.disapprove');
});













Route::get('/admin/approve-users', [AdminDashboardController::class, 'approveUsers'])->name('admin.approve_users');
Route::post('/admin/approve-user/{id}', [AdminDashboardController::class, 'approveUser'])->name('admin.approve_user');



Route::group(['middleware' => ['auth', 'approved']], function () {

    Route::resource('backend/recommendations', RecommendationController::class);
 //   Route::get('/some-restricted-page', [SomeController::class, 'restrictedPage'])->name('restricted.page');
});


Route::get('/approval-required', function () {
    return view('auth.approval_required');
})->name('approval_required');
