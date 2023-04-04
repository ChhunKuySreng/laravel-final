<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SubCategoryController;

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

// Route::get('/', function () {
//     return view('layouts.frontend.app');
// });

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/about', function () {
    return view('frontend.about.index');
});
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/contact', function () {
    return view('frontend.contact.index');
});
Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Slideshow View
Route::resource('slideshow', SlideshowController::class);
//Slideshow Order & Enabled
Route::get('/{id},{command},{order}', [SlideshowController::class, 'custom'])->name('slideshow.custom');
//Slideshow Delete
Route::get('delete-slideshow/{id}', [SlideshowController::class, 'destroy'])->name('slideshow.destroy');

//Product View
Route::resource('product', ProductController::class);
//Product Product Status
Route::get('/{id},{command}', [ProductController::class, 'custom'])->name('product.custom');
//Product Delete
Route::get('delete-product/{id}', [ProductController::class, 'destroy'])->name('ProductController.destroy');

//Category View
Route::resource('category', CategoryController::class);
//Category Delete
Route::get('delete-category/{id}', [CategoryController::class, 'destroy'])->name('CategoryController.destroy');

//SubCategory View
Route::resource('subcategory', SubCategoryController::class);
//SubCategory Delete
Route::get('delete-subcategory/{id}', [SubCategoryController::class, 'destroy'])->name('SubCategoryController.destroy');

//Category View
Route::resource('user', UserController::class);
//Category Delete
Route::get('delete-user/{id}', [UserController::class, 'destroy'])->name('User.destroy');

//SwitchLang
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
