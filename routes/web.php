<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
        return view('home');
    })->middleware('auth');


Route::get('add', function () {
    return view('Booking/add');
});

Route::get('bookedpage', function () {
    return view('Booking/bookedpage');
});



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/bookedpage', [App\Http\Controllers\HomeController::class, 'userBooked'])->middleware('verified');

Route::Post('store-booking', [App\Http\Controllers\HomeController::class, 'store'])->middleware('verified');

Route::get('login/{provider}', [LoginController::class, 'redirectToProvider']);
Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('bookingview', [App\Http\Controllers\BookNowController::class, 'index'])->name('bookingview')->middleware('verified');
Route::Post('checkAvailablity', [App\Http\Controllers\HomeController::class, 'checkAvailablity'])->name('checkAvailablity')->middleware('verified');

