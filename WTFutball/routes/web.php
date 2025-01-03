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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Buat Tim
Route::post('/tim', [App\Http\Controllers\TimController::class, 'store'])->name('buatTim');

// Topup
Route::get('/topup', [App\Http\Controllers\TopupController::class, 'index'])->name('topupIndex');
Route::post('/topup', [App\Http\Controllers\TopupController::class, 'redeem'])->name('topupRedeem');

// Transaksi Pemain
Route::prefix('transaksi')->group(function () {
    Route::get('/beli', [App\Http\Controllers\TransaksiController::class, 'indexBeli'])->name('indexBeliPemain');
    Route::get('/jual', [App\Http\Controllers\TransaksiController::class, 'indexJual'])->name('indexJualPemain');
    Route::get('/beli/{id}', [App\Http\Controllers\TransaksiController::class, 'beliPemain'])->name('beliPemain');
    Route::get('/jual/{id}', [App\Http\Controllers\TransaksiController::class, 'jualPemain'])->name('jualPemain');
});
Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksiIndex');
