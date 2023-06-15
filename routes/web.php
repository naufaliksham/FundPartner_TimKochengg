<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\DetailUsahaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/usaha', [DetailUsahaController::class, 'showDetailUsaha'])->name('detailUsaha');
Route::get('/usaha/{id}', [DetailUsahaController::class, 'showDetailUsaha2'])->name('detailUsaha');
Route::get('/rincian', [PembayaranController::class, 'show'])->name('rincianInvestment');
Route::get('/bayar/{id}', [PembayaranController::class, 'bayar'])->name('bayar');
Route::post('/bayar/{id}', [PembayaranController::class, 'pembayaran'])->name('pembayaran');
// Auth::routes();

Route::middleware(['auth','user-role:user'])->group(function() {
    Route::get("/home",[]);
});

// LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// REGISTER
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

//MITRA
// Route::group(['as' => 'mitra.', 'prefix' => 'mitra'], function () {
    Route::get('/indexmitra', [MitraController::class, 'index'])->name('index');
    Route::get('/form_umkm', [MitraController::class, 'create'])->name('create');

    //form mitra
    Route::post('/store_umkm', [MitraController::class, 'store'])->name('store');
    Route::get('/editUsaha/{id}', [DetailUsahaController::class, 'edit']);
    Route::post('/updateUsaha/{id}', [DetailUsahaController::class, 'update'])->name('updateUsaha');
    Route::delete('/destroyUsaha/{id}', [DetailUsahaController::class, 'destroy'])->name('destroyUsaha');

    // });

// LUPA PASSWORD
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.forgot');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');


