<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\DetailUsahaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProfilController;

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



// Auth::routes();

Route::middleware(['auth', 'user-role:user'])->group(function () {
    Route::get("/home", []);
});

// LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// LOGOUT
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// REGISTER
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

//MITRA
// Route::group(['as' => 'mitra.', 'prefix' => 'mitra'], function () {
Route::get('/indexmitra', [MitraController::class, 'index'])->name('indexmitra')->middleware('mitra');
Route::get('/form_umkm', [MitraController::class, 'create'])->name('create')->middleware('mitra');

//form mitra
Route::post('/store_umkm', [MitraController::class, 'store'])->name('store')->middleware('mitra');
Route::get('/editUsaha/{id}', [DetailUsahaController::class, 'edit'])->middleware('mitra');
Route::post('/updateUsaha/{id}', [DetailUsahaController::class, 'update'])->name('updateUsaha')->middleware('mitra');
Route::delete('/destroyUsaha/{id}', [DetailUsahaController::class, 'destroy'])->name('destroyUsaha')->middleware('mitra');

Route::get('/usaha/{id}', [DetailUsahaController::class, 'showDetailUsaha2'])->name('detailUsaha')->middleware('mitra');
Route::get('/rincian', [PembayaranController::class, 'show'])->name('rincianInvestment')->middleware('mitra');
Route::get('/bayar/{id}', [PembayaranController::class, 'bayar'])->name('bayar')->middleware('mitra');
Route::post('/bayar/{id}', [PembayaranController::class, 'pembayaran'])->name('pembayaran')->middleware('mitra');
Route::post('/tagihan/{id}', [MitraController::class, 'tagihan'])->name('tagihan');

// });

// INVESTOR

Route::get('investor-page', [InvestorController::class, 'index'])->name('indexinvestor')->middleware('investor');
Route::get('investor-page/pembayaran/{id}', [InvestorController::class, 'payment'])->middleware('investor');
Route::post('bayar-sekarang/{id}', [InvestorController::class, 'handlePayment'])->middleware('investor');
Route::get('investor-page/transaksi', [InvestorController::class, 'historyTransaction'])->middleware('investor');

// TOP-UP
Route::get('/topup', [ProfilController::class, 'showTopupForm'])->name('topup.form');
Route::post('/topup', [ProfilController::class, 'processTopup'])->name('topup.process');


//PROFILE
Route::get('/profile', [ProfilController::class, 'index'])->name('profile.index');

// UPLOAD KTP & FOTO
Route::get('/upload/ktp', [ProfilController::class, 'showUploadForKtp'])->name('upload.ktp');
Route::get('/upload/foto', [ProfilController::class, 'showUploadForFoto'])->name('upload.foto');
Route::post('/upload', [ProfilController::class, 'processUpload'])->name('upload.process');

// ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/mitra', [AdminController::class, 'mitraUmkmList'])->name('mitraAdmin');
Route::get('/admin/investor', [AdminController::class, 'investorList'])->name('investorAdmin');
Route::get('/admin/investor/{id}/edit-saldo', [AdminController::class, 'editInvestorSaldo'])->name('editInvestorSaldo');
Route::put('/admin/investor/{id}/update-saldo', [AdminController::class, 'updateInvestorSaldo'])->name('updateInvestorSaldo');
Route::put('/admin/investor/{id}/validasi-foto', [AdminController::class, 'validasiFoto'])->name('validasiFoto');

