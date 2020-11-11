<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LotController;
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
 * Category resource
 */
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);

/**
 * Lot routes
 */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/add-lot', [LotController::class, 'create']);
    Route::post('/add-lot', [LotController::class, 'store']);

    Route::get('/{lot}/edit', [LotController::class, 'edit'])->middleware('can:edit,lot');
    Route::patch('/{lot}', [LotController::class, 'update'])->middleware('can:update,lot');

    Route::delete('/{lot}', [LotController::class, 'destroy'])->middleware('can:destroy,lot');
});


/**
 * Others
 */
Route::get('/', [HomeController::class, 'index']);

/**
 * User's lots 
 */
Route::get('/my-lots', function () {
    return view('pages.my-lots');
});

/**
 * Search 
 */
Route::get('/search', function () {
    return view('pages.search');
});

Route::get('/{lot}', [LotController::class, 'show']);

Auth::routes();
