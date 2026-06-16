<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicReportController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Mahasiswa\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ClaimRequestController;

/*
|--------------------------------------------------------------------------
| PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/report', [PublicReportController::class, 'create'])
    ->name('report.create');

Route::post('/submit-report', [PublicReportController::class, 'store'])
    ->name('report.store');

Route::get('/item/{id}', [ItemController::class, 'show'])
    ->name('item.show');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| CLAIM BARANG
|--------------------------------------------------------------------------
| User harus login untuk klaim barang
*/

Route::middleware('auth')->group(function () {

    Route::get('/item/{id}/claim', [ClaimRequestController::class, 'create'])
        ->name('item.claim.form');

    Route::post('/item/{id}/claim', [ClaimRequestController::class, 'store'])
        ->name('item.claim.store');
});


/*
|--------------------------------------------------------------------------
| MAHASISWA
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/account', [DashboardController::class, 'account'])
        ->name('dashboard.account');
});
