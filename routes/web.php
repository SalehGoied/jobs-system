<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('show.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');


// Logout route

Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/positions', [FrontController::class, 'positions'])->name('positions');
    Route::get('/positions/{position}', [FrontController::class, 'position'])->name('position');

    // Group for admin role
    Route::middleware(['role:admin'])->prefix('admin')->as('admin.')->group(function () {

        Route::resource('users', UserController::class);
        Route::resource('positions', PositionController::class);
        Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
        Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


        Route::get('/admin/settings', function () {
            return view('admin.settings');
        });
    });

    Route::middleware(['role:employee'])->group(function () {
        Route::post('/apply', [FrontController::class, 'storeApplication'])->name('apply.store');
    });
});
