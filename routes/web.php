<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameAccountController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

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


// search game account
Route::get('/gameAccount/search', [GameAccountController::class, 'searchGameAccount'])
    ->name('Search Game Account');

// create
Route::post('/gameAccount/input', [GameAccountController::class, 'storeGameAccount'])
    ->name('Input Game Account');
Route::get('/gameAccount/input', [GameAccountController::class, 'sellGameAccount'])
    ->name('Sell Game Account Page');

// read
Route::get('/', [GameAccountController::class, 'indexGameAccount'])
    ->name('Home Page');
Route::get('/gameAccount/{id}', [GameAccountController::class, 'showGameAccount'])
    ->name('View Game Account');

// update
Route::patch('/gameAccount/edit/{id}', [GameAccountController::class, 'updateGameAccount'])
    ->name('Edit Game Account');
Route::get('/gameAccount/edit/{id}', [GameAccountController::class, 'editGameAccount'])
    ->name('Edit Game Account Page');

// delete
Route::delete('/gameAccount/delete/{id}', [GameAccountController::class, 'destroyGameAccount'])
    ->name('Delete Game Account');

// view profile
Route::get('/user/{id}', [UserController::class, 'viewUser'])
    ->name('View User Profile');





//search transaksi
Route::get('/transaksi/search', [TransaksiController::class, 'searchTransaction'])
->name('Search Transaksi');

// create
Route::post('/transaksi/buat', [TransaksiController::class, 'storeTransaction'])
->name('Buat Transaksi');
Route::get('/transaksi/buat', [TransaksiController::class, 'createTransaction'])
->name('Buat Transaksi Page');

// read
Route::get('/transaksi_history', [TransaksiController::class, 'indexTransaction'])
->name('Transaksi History Page');
Route::get('/transaksi/{id}', [TransaksiController::class, 'showTransaction'])
->name('View Transaksi History');

// update
Route::patch('/transaksi/edit/{id}', [TransaksiController::class, 'updateTransaction'])
->name('Edit Transaksi');
Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'editTransaction'])
->name('Edit Transaction Page');

// delete
Route::delete('/transaksi/delete/{id}', [TransaksiController::class, 'destroyTransaction'])
->name('Delete Transaction');



Route::get('/type/{type}', [\App\Http\Controllers\TypeController::class, 'getType']);
Route::get('/view_gameAccount/{gameAccount}', [\App\Http\Controllers\GameAccountController::class, 'getGameAccountDetail'])
->name('Game Account Page');



