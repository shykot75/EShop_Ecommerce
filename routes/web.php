<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\EShopController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;

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

    // BRAND MODULE --- SHOW, EDIT, UPDATE
    Route::prefix('brand')->group(function(){
        Route::get('/view', [BrandController::class, 'brandView'])->name('all.brand');
        Route::post('/create', [BrandController::class, 'brandCreate'])->name('brand.create');
        Route::get('/edit/{id}', [BrandController::class, 'brandEdit'])->name('brand.edit');
        Route::post('/update/{id}', [BrandController::class, 'brandUpdate'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'brandDelete'])->name('brand.delete');
    });

    // CATEGORY MODULE --- SHOW, EDIT, UPDATE
    Route::prefix('category')->group(function(){
        Route::get('/view', [CategoryController::class, 'categoryView'])->name('all.category');
        Route::post('/create', [CategoryController::class, 'categoryCreate'])->name('category.create');
        Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
    });

    // SUB CATEGORY MODULE --- SHOW, EDIT, UPDATE
    Route::prefix('subcategory')->group(function(){
        Route::get('/view', [SubCategoryController::class, 'subcategoryView'])->name('all.subcategory');
        Route::post('/create', [SubCategoryController::class, 'subcategoryCreate'])->name('subcategory.create');
        Route::get('/edit/{id}', [SubCategoryController::class, 'subcategoryEdit'])->name('subcategory.edit');
        Route::post('/update/{id}', [SubCategoryController::class, 'subcategoryUpdate'])->name('subcategory.update');
        Route::get('/delete/{id}', [SubCategoryController::class, 'subcategoryDelete'])->name('subcategory.delete');
    });

    // SUB SUB CATEGORY MODULE --- SHOW, EDIT, UPDATE
    Route::prefix('sub-subcategory')->group(function(){
        Route::get('/view', [SubCategoryController::class, 'subSubcategoryView'])->name('all.sub-subcategory');
        Route::get('/fetch/{category_id}', [SubCategoryController::class, 'subCategoryFetch'])->name('subcategory.fetch');
        Route::post('/create', [SubCategoryController::class, 'subSubcategoryCreate'])->name('sub-subcategory.create');
        Route::get('/edit/{id}', [SubCategoryController::class, 'subSubcategoryEdit'])->name('sub-subcategory.edit');
        Route::post('/update/{id}', [SubCategoryController::class, 'subSubcategoryUpdate'])->name('sub-subcategory.update');
        Route::get('/delete/{id}', [SubCategoryController::class, 'subSubcategoryDelete'])->name('sub-subcategory.delete');
    });



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
