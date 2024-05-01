<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;




Route::get('/' , [FrontendController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
   
    
});
