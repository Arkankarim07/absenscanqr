<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Generator;
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

Route::get('/', function () {

    $qrcode = new Generator;
    $qr = $qrcode->size(100)->generate('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
    
    return view('dashboard.index', [
        'qr' => $qr
    ]);
});

Route::resource('/absen', AbsenController::class);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/regist', [RegisterController::class, 'index']);
Route::post('/regist', [RegisterController::class, 'store']);
