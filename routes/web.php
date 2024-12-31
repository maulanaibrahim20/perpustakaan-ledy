<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Master\BookController;
use Illuminate\Support\Facades\Route;

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
    return view('landing.layout.home');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::get('/katalog-buku', function () {
    return view('landing.pages.katalog_buku');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout', [LoginController::class, 'logout']);

    Route::group(['middleware' => ['can:admin']], function () {
        Route::prefix('admin')->group(function(){
            Route::prefix('master')->group(function(){
                Route::get('book',[BookController::class, 'index']);
            });
        });
        Route::get('/admin/dashboard', [DashboardController::class, 'admin']);
    });
});
