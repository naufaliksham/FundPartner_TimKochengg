<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\DetailUsahaController;
use Illuminate\Support\Facades\Auth;

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

// Auth::routes();

// Route::middleware(['auth','user-role:user'])->group(function() {
//     Route::get("/home",[]);
// });
