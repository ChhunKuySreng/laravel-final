<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SlideshowController;

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
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

//Slideshow View
Route::resource('slideshow', SlideshowController::class);
//Slideshow Order
Route::get('/{id},{command},{order}', [SlideshowController::class, 'custom'])->name('slideshow.custom');
//Slideshow Delete
Route::get('delete-slideshow/{id}', [SlideshowController::class, 'destroy'])->name('slideshow.destroy');

Auth::routes();
