<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;




Route::get('/' , [FrontendController::class, 'index']);
Route::get('category',[FrontendController::class,'category']);
Route::get('view-category/{id}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_id}/{prod_id}', [FrontendController::class,'productview']);

Auth::routes();

Route::get('load-cart-data',[CartController::class, 'cartcount']);
Route::get('load-wishlist-data',[WishlistController::class, 'wishlistcount']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('add-to-cart',[CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
Route::post('update-cart', [CartController::class, 'updateCart']);

Route::post('add-to-wishlist',[WishlistController::class,'add']);
Route::post('delete-wishlist-item',[WishlistController::class, 'deleteitem']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeOrder']);

    Route::get('my-order',[UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);

    Route::get('wishlist',[WishlistController::class,'index']);
    
    
    
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function (){
        return view('admin.index');
    });

// Route::middleware(['auth', 'isAdmin'])->group(function () {
//     Route::get('/dashboard', [FrontendController::class, 'index']); // Corrected namespace

    Route::get('categories', [CategoryController::class, 'index']); // Corrected namespace
    Route::get('add-category', [CategoryController::class, 'add']); // Corrected namespace
    Route::post('insert-category', [CategoryController::class, 'insert']); // Corrected namespace
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}',[CategoryController::class, 'destroy']);

    Route::get('products', [ProductController::class, 'index']); // Corrected namespace
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);
    Route::get('edit-prod/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get(' delete-prod/{id}',[ProductController::class, 'destroy']);

   Route::get('orders',[OrderController::class, 'index']);
   Route::get('admin/view-order/{id}',[OrderController::class, 'view']);
   Route::put('update-order/{id}',[OrderController::class, 'updateorder']);

   Route::get('order-history',[OrderController::class, 'orderhistory']);

   Route::get('users',[DashboardController::class, 'users']);
   Route::get('view-user/{id}',[DashboardController::class, 'viewuser']);

   
    
});
