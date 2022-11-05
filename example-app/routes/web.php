<?php

use App\Http\Controllers\KostController;
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

Route::get('/', [KostController::class, 'index']);
Route::get('/admin', [KostController::class, 'admindata'], [])->name('adminlist');
Route::get('/input', [KostController::class, 'admininput'], [])->name('admininput');
Route::post('/simpankost', [KostController::class, 'simpankost'])->name('simpankost');


