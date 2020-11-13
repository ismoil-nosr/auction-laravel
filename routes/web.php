<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LotController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserBidsController;
use App\Http\Controllers\UserLotsController;
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
 * Category section
 */
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);

/**
 * Lot section
 */
Route::group(['middleware' => ['auth']], function () {
    
    // operations with LotController
    Route::get('/lots', [LotController::class, 'index']);

    Route::get('/add-lot', [LotController::class, 'create']);
    Route::post('/add-lot', [LotController::class, 'store']);

    Route::get('/{lot}/edit', [LotController::class, 'edit'])->middleware('can:edit,lot');
    Route::patch('/{lot}', [LotController::class, 'update'])->middleware('can:update,lot');

    Route::delete('/{lot}', [LotController::class, 'destroy'])->middleware('can:destroy,lot');

    // operations with BidController
    Route::post('/{lot}/bids', [BidController::class, 'store']);

    // operations with UserLotsController
    Route::get('/my-lots', [UserLotsController::class, 'index']);

    // operations with UserBidsController
    Route::get('/my-bids', [UserBidsController::class, 'index']);
});

/**
 * Homepage
 */
Route::get('/', [HomeController::class, 'index']);

/**
 * User's lots 
 */
Route::get('/my-lots', function () {
    return view('pages.my-lots');
})->middleware('auth');

/**
 * Search 
 */
Route::post('/search', [SearchController::class, 'show']);

/**
 * Custom lot route
 */
Route::get('/{lot}', [LotController::class, 'show']);

Auth::routes();