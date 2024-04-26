<?php

use App\Http\Controllers\BookingTableController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/add-to-cart/{id}', [CartController::class, 'store'])->name('add-to-cart');
// Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::resource('food', FoodController::class);
Route::resource('cart', CartController::class);



Route::post('/checkout/store', [CheckoutController::class, 'checkoutstore'])->name('checkout.store');
Route::post('/checkout/store/paypal', [CheckoutController::class, 'store'])->name('checkout.store.paypal');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');


//pay
Route::get('/payment', [CheckoutController::class, 'paywithpaypal'])->name('paypal');
Route::get('/payment/success', [CheckoutController::class, 'paypalsuccess'])->name('paypal.success');


Route::resource('bookingTable', BookingTableController::class);


// Route::post('bookingTable', [BookingTableController::class, 'store'])->name('bookingTable');
// Route::post('bookingTable', [bookingTable::class, 'store'])->name('z');



