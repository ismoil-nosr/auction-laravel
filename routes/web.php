<?php

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

Route::get('/sign-up', function () {
    return view('auth.sign-up');
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

Route::get('/all-lots', function () {
    return view('pages.all-lots');
});

Route::get('/my-lots', function () {
    return view('pages.my-lots');
});

Route::get('/search', function () {
    return view('pages.search');
});
