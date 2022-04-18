<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// admin routes
Route::group(['prefix'=>'admin'],function(){
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/user/delete/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.deleteStore');
    Route::get('/user/chnage-role/{id}', [App\Http\Controllers\AdminController::class, 'makeAdmin'])->name('admin.changeRole');
    Route::get('/add-admin', [App\Http\Controllers\AdminController::class, 'addAdmin'])->name('addAdmin');
    Route::post('/store', [App\Http\Controllers\AdminController::class, 'store'])->name('store.admin');


});
// client routes
Route::group(['prefix'  =>   'client'], function() {
    Route::get('/dashboard', [App\Http\Controllers\ClientController::class, 'index'])->name('client.dashboard');
    // category routes
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/category/visibility/{id}',[App\Http\Controllers\CategoryController::class, 'visibility'])->name('category.visibility');
    // product routes
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');
});
Route::get('/', [App\Http\Controllers\StoreController::class, 'mainHomePage'])->name('mainHomePage');
Route::get('/stores',[App\Http\Controllers\StoreController::class, 'index'])->name('stores');
Route::get('/{id}',[App\Http\Controllers\StoreController::class, 'findStore'])->name('store');
// Route::get('/store/{user_id}/{cat_slug}',[App\Http\Controllers\StoreController::class, 'listByCat'])->name('listByCat');
Route::get('/store/{user_id}/{slug}',[App\Http\Controllers\StoreController::class, 'show'])->name('store.show');
// Route::get('/store/{user_id}/{slug}',[App\Http\Controllers\StoreController::class, 'show'])->name('show');
// Route::get('/store/{user_id}/{slug}',[App\Http\Controllers\StoreController::class, 'show'])->name('show');


// cart routes

Route::get('/cart/index', [App\Http\Controllers\CartController::class, 'index'])->name('cart.list');
Route::get('/add-to-cart/{id}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');
Route::patch('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [App\Http\Controllers\CartController::class, 'clearAllCart'])->name('cart.clear');

// order routes
Route::get('/order/create',[App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
Route::post('/order/store',[App\Http\Controllers\OrderController::class, 'store'])->name('order.store');