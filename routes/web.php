<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AbsenController::class, 'index']);
Route::get('/absen', [AbsenController::class, 'index']);
Route::post('/absen', [AbsenController::class, 'store'])->name('store');
Route::delete('/absen{absen}', [AbsenController::class, 'destroy']);


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/regist', [RegisterController::class, 'index']);
Route::post('/regist', [RegisterController::class, 'store']);
