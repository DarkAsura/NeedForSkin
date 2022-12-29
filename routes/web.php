<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameAccountController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TypeController;
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
Route::post('/gameAccount/create', [GameAccountController::class, 'storeGameAccount'])
    ->name('Buat Game Account')->middleware('AdminMemberOnly');
Route::get('/gameAccount/create',function(){
    return view('create_gameAccount');
    })->name('Buat Game Account')->middleware('AdminMemberOnly');

// read
Route::get('/', [GameAccountController::class, 'indexGameAccount'])
    ->name('Home Page');
Route::get('/gameAccount/{id}', [GameAccountController::class, 'showGameAccount'])
    ->name('View Game Account');

// update
Route::patch('/gameAccount/edit/{id}', [GameAccountController::class, 'updateGameAccount'])
    ->name('Edit Game Account')->middleware('AdminMemberOnly');
Route::get('/gameAccount/edit/{id}', [GameAccountController::class, 'editGameAccount'])
    ->name('Edit Game Account Page')->middleware('AdminMemberOnly');

// delete
Route::delete('/gameAccount/delete/{id}', [GameAccountController::class, 'destroyGameAccount'])
    ->name('Delete Game Account')->middleware('AdminMemberOnly');

// view profile
Route::get('/user/{id?}', [UserController::class, 'viewUser'])
    ->name('View User Profile')->middleware('AdminMemberOnly');

//search transaksi
Route::get('/transaksi/search', [TransaksiController::class, 'searchTransaction'])
->name('Search Transaksi');

// create
Route::post('/transaksi/buat', [TransaksiController::class, 'storeTransaction'])
->name('Buat Transaksi')->middleware('AdminMemberOnly');
Route::get('/transaksi/buat/{gameAccount}', [TransaksiController::class, 'createTransaction'])
->name('Buat Transaksi Page')->middleware('AdminMemberOnly');

// read
Route::get('/transaksi_history/{id?}', [TransaksiController::class, 'indexTransaction'])
->name('Transaksi History Page')->middleware('AdminMemberOnly');
Route::get('/transaksi/{id}', [TransaksiController::class, 'showTransaction'])
->name('View Transaksi History')->middleware('AdminMemberOnly');

// update
Route::patch('/transaksi/edit/{id}', [TransaksiController::class, 'updateTransaction'])
->name('Edit Transaksi')->middleware('AdminMemberOnly');
Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'editTransaction'])
->name('Edit Transaction Page')->middleware('AdminMemberOnly');

// delete
Route::delete('/transaksi/delete/{id}', [TransaksiController::class, 'destroyTransaction'])
->name('Delete Transaction');



Route::get('/type/{type}', [TypeController::class, 'getType']);
Route::get('/view_gameAccount/{gameAccount}', [GameAccountController::class, 'getGameAccountDetail'])
->name('Game Account Page');

// login regis
Route::get('/auth/login',[UserController::class,'index_login'])->name('index_login')->middleware('GuestOnly');
Route::get('/auth/register',[UserController::class,'index_register'])->name('index_register')->middleware('GuestOnly');

// login regis logout
Route::post('/auth/login',[UserController::class,'login'])->name('login');
Route::post('/auth/register',[UserController::class,'register'])->name('register');
Route::post('/auth/logout',[UserController::class,'logout'])->name('logout');

