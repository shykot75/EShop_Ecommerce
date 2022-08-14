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
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\LanguageController;

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

// ************************************* WEBSITE MODULE STARTS ******************************************

// ------- HOME URL ---------
Route::get('/', [EShopController::class, 'index'])->name('home');

// ------ LANGUAGE MODULE ------
Route::get('/language/bangla', [LanguageController::class, 'bangla'])->name('bangla.language');
Route::get('/language/english', [LanguageController::class, 'english'])->name('english.language');

// ------ PRODUCT DETAILS MODULE ------
Route::get('product/details/{id}/{slug}', [EShopController::class, 'productDetails'])->name('product.details');

// ------ PRODUCT TAGS DETAILS MODULE ------
Route::get('product/tag/{tag}', [EShopController::class, 'tagWiseProduct'])->name('product.tag');





// ************************************* WEBSITE MODULE ENDS ******************************************











// ---------------------------- ADMIN LOGIN ROUTE ----------------------------
Route::middleware('admin:admin')->group(function(){
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');
});

// ------------------------------ ADMIN MODULES -------------------------------
Route::middleware(['auth:sanctum,admin','auth:admin', config('jetstream.auth_session'), 'verified'])->group(function () {
    // ADMIN DASHBOARD
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth:admin');

    // ADMIN PROFILE --- SHOW, EDIT, UPDATE
    Route::get('admin/profile/{id}', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::get('admin/profile/edit/{id}', [AdminProfileController::class, 'adminProfileEdit'])->name('admin-profile.edit');
    Route::post('admin/profile/update/{id}', [AdminProfileController::class, 'adminProfileUpdate'])->name('admin-profile.update');

    // ADMIN PASSWORD --- EDIT, UPDATE
    Route::get('admin/password-change/{id}', [AdminProfileController::class, 'passwordChange'])->name('admin.change.password');
    Route::post('admin/password-update/{id}', [AdminProfileController::class, 'passwordUpdate'])->name('admin.update.password');

    // BRAND MODULE --- CREATE, MANAGE, EDIT, UPDATE, DELETE
    Route::prefix('brand')->group(function(){
        Route::get('/view', [BrandController::class, 'brandView'])->name('all.brand');
        Route::post('/create', [BrandController::class, 'brandCreate'])->name('brand.create');
        Route::get('/edit/{id}', [BrandController::class, 'brandEdit'])->name('brand.edit');
        Route::post('/update/{id}', [BrandController::class, 'brandUpdate'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'brandDelete'])->name('brand.delete');
    });

    // CATEGORY MODULE --- CREATE, MANAGE, EDIT, UPDATE, DELETE
    Route::prefix('category')->group(function(){
        Route::get('/view', [CategoryController::class, 'categoryView'])->name('all.category');
        Route::post('/create', [CategoryController::class, 'categoryCreate'])->name('category.create');
        Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
    });

    // SUB CATEGORY MODULE --- CREATE, MANAGE, EDIT, UPDATE, DELETE
    Route::prefix('subcategory')->group(function(){
        Route::get('/view', [SubCategoryController::class, 'subcategoryView'])->name('all.subcategory');
        Route::post('/create', [SubCategoryController::class, 'subcategoryCreate'])->name('subcategory.create');
        Route::get('/edit/{id}', [SubCategoryController::class, 'subcategoryEdit'])->name('subcategory.edit');
        Route::post('/update/{id}', [SubCategoryController::class, 'subcategoryUpdate'])->name('subcategory.update');
        Route::get('/delete/{id}', [SubCategoryController::class, 'subcategoryDelete'])->name('subcategory.delete');
    });

    // SUB SUB CATEGORY MODULE --- CREATE, MANAGE, EDIT, UPDATE, DELETE
    Route::prefix('sub-subcategory')->group(function(){
        Route::get('/view', [SubCategoryController::class, 'subSubcategoryView'])->name('all.sub-subcategory');
        Route::get('/fetch/{category_id}', [SubCategoryController::class, 'subCategoryFetch'])->name('subcategory.fetch');
        Route::get('/sub/fetch/{subcategory_id}', [SubCategoryController::class, 'subSubCategoryFetch'])->name('sub-subcategory.fetch');
        Route::post('/create', [SubCategoryController::class, 'subSubcategoryCreate'])->name('sub-subcategory.create');
        Route::get('/edit/{id}', [SubCategoryController::class, 'subSubcategoryEdit'])->name('sub-subcategory.edit');
        Route::post('/update/{id}', [SubCategoryController::class, 'subSubcategoryUpdate'])->name('sub-subcategory.update');
        Route::get('/delete/{id}', [SubCategoryController::class, 'subSubcategoryDelete'])->name('sub-subcategory.delete');
    });

    // PRODUCT MODULE --- CREATE, MANAGE, EDIT, UPDATE, DELETE
    Route::prefix('product')->group(function(){
        Route::get('/add', [ProductController::class, 'addProduct'])->name('add.product');
        Route::post('/create', [ProductController::class, 'createProduct'])->name('create.product');
        Route::get('/manage', [ProductController::class, 'manageProduct'])->name('manage.product');
        Route::get('/edit/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
        Route::post('/update/{id}', [ProductController::class, 'updateProduct'])->name('update.product');
        Route::post('/update/multi/images', [ProductController::class, 'updateProductMultiImage'])->name('update.multiple-product-image');
        Route::post('/update/thumb/image/{id}', [ProductController::class, 'updateProductThumbImage'])->name('update.thumbnail-product-image');
        Route::get('/delete/multi/image/{id}', [ProductController::class, 'deleteProductMultiImage'])->name('delete.multiple-product-image');
        Route::get('/update/product-status/{id}', [ProductController::class, 'updateProductStatus'])->name('statusUpdate.product');
        Route::get('/delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');
        Route::get('/details/{id}', [ProductController::class, 'detailsProduct'])->name('details.product');
    });

    // SLIDER MODULE --- CREATE, MANAGE, EDIT, UPDATE, DELETE
    Route::prefix('slider')->group(function(){
        Route::get('/view', [SliderController::class, 'sliderView'])->name('manage.slider');
        Route::post('/create', [SliderController::class, 'sliderCreate'])->name('slider.create');
        Route::get('/edit/{id}', [SliderController::class, 'sliderEdit'])->name('slider.edit');
        Route::post('/update/{id}', [SliderController::class, 'sliderUpdate'])->name('slider.update');
        Route::get('/details/{id}', [SliderController::class, 'sliderDetails'])->name('slider.details');
        Route::get('/update/slider-status/{id}', [SliderController::class, 'updateSliderStatus'])->name('statusUpdate.slider');
        Route::get('/delete/{id}', [SliderController::class, 'sliderDelete'])->name('slider.delete');

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
