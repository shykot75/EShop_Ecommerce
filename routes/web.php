<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\EShopController;
use App\Http\Controllers\User\UserController;

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


// --------------------------- HOME URL -----------------------------
Route::get('/', [EShopController::class, 'index'])->name('home');


// ---------------------------- ADMIN LOGIN ROUTE ----------------------------
Route::middleware('admin:admin')->group(function(){
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});

// ------------------------------ ADMIN MODULES -------------------------------
Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function () {
    // ADMIN DASHBOARD
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth:admin');

    // ADMIN PROFILE --- SHOW, EDIT, UPDATE
    Route::get('admin/profile/{id}', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::get('admin/profile/edit/{id}', [AdminProfileController::class, 'adminProfileEdit'])->name('admin-profile.edit');
    Route::post('admin/profile/update/{id}', [AdminProfileController::class, 'adminProfileUpdate'])->name('admin-profile.update');

    // ADMIN PASSWORD --- EDIT, UPDATE
    Route::get('admin/password-change/{id}', [AdminProfileController::class, 'passwordChange'])->name('admin.change.password');
    Route::post('admin/password-update/{id}', [AdminProfileController::class, 'passwordUpdate'])->name('admin.update.password');
});






















// ------------------------------ USER MODULES -----------------------------------------
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // USER DASHBOARD
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    // USER PROFILE MODULE -- EDIT, UPDATE
    Route::get('/user/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::post('/user/profile/update', [UserController::class, 'userProfileUpdate'])->name('user.profile.update');
    // USER PASSWORD MODULE -- EDIT, UPDATE
    Route::get('/user/profile/change-password', [UserController::class, 'userChangePassword'])->name('user.change.password');
    Route::post('/user/profile/update-password', [UserController::class, 'userUpdatePassword'])->name('user.update.password');




});
