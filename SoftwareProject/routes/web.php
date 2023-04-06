<?php

use App\Http\Controllers\JewelleryController as HomeJewelleryController;
use App\Http\Controllers\admin\JewelleryController as AdminJewelleryController;
use App\Http\Controllers\user\JewelleryController as UserJewelleryController;

use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\user\OrderController as UserOrderController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [HomeJewelleryController::class, 'index'])->name('welcome');

Route::resource('/admin/jewellery', AdminJewelleryController::class)->middleware(['auth'])->names('admin.jewellery');
Route::resource('/user/jewellery', UserJewelleryController::class)->middleware(['auth'])->names('user.jewellery');

Route::resource('/admin/orders', AdminOrderController::class)->middleware(['auth'])->names('admin.orders');
Route::resource('/user/orders', UserOrderController::class)->middleware(['auth'])->names('user.orders');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//admin shopping cart
Route::get('/admin/shopping-cart', [AdminJewelleryController::class, 'jewelleryCart'])->name('admin.shopping.cart');
Route::get('/admin/jewellery/{id}/add', [AdminJewelleryController::class, 'addJewellerytoCart'])->name('admin.addjewellery.to.cart');
Route::patch('/admin/update-shopping-cart', [AdminJewelleryController::class, 'updateCart'])->name('admin.update.sopping.cart');
Route::delete('/admin/delete-cart-product', [AdminJewelleryController::class, 'deleteProduct'])->name('admin.delete.cart.product');
// //shopping cart
// Route::get('/shopping-cart', [JewelleryController::class, 'jewelleryCart'])->name('shopping.cart');
// Route::get('/jewellery/{id}', [JewelleryController::class, 'addJewellerytoCart'])->name('addjewellery.to.cart');
// Route::patch('/update-shopping-cart', [JewelleryController::class, 'updateCart'])->name('update.sopping.cart');
// Route::delete('/delete-cart-product', [JewelleryController::class, 'deleteProduct'])->name('delete.cart.product');


require __DIR__.'/auth.php';

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
