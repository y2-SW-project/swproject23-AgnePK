<?php

use App\Http\Controllers\JewelleryController;
use App\Http\Controllers\OrderController;
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
Route::resource('/jewellery', JewelleryController::class);
Route::resource('/orders', OrderController::class)->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//shopping cart
Route::get('/shopping-cart', [JewelleryController::class, 'jewelleryCart'])->name('shopping.cart');
Route::get('/jewellery/{id}', [JewelleryController::class, 'addJewellerytoCart'])->name('addjewellery.to.cart');
Route::patch('/update-shopping-cart', [JewelleryController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [JewelleryController::class, 'deleteProduct'])->name('delete.cart.product');


require __DIR__.'/auth.php';

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
