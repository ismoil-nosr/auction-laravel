<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/**
 * Auth section
 */
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

/**
 * Lot page
 */
Route::get('/lot', function () {
    return view('lot.lot');
});

Route::get('/add-lot', function () {
    return view('lot.add-lot');
});

/**
 * Other pages
 */
Route::get('/', function () {
    return view('index');
});

Route::get('/my-lots', function () {
    return view('pages.my-lots');
});

Route::get('/search', function () {
    return view('pages.search');
});

Route::resource('categories', CategoryController::class);

Auth::routes();
