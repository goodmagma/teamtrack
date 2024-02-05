<?php

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

/**
 * Auth: Login & Registration
 */
Auth::routes(['register' => true]);


/**
 * Dashboard redirect
 */
Route::get('/', function () {
    return redirect()->route('dashboard');
});


/**
 * Pages Routes
 */
Route::get('/pages/{page}', [App\Http\Controllers\PagesController::class, 'page'])->name('pages.page');


/**
 * User Routes
 */
Route::group(['middleware' => ['auth']], function () {
    
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::post('/password', [App\Http\Controllers\ProfileController::class, 'passwordUpdate'])->name('profile.password.update');
        Route::get('/theme-switch', [App\Http\Controllers\ProfileController::class, 'themeSwitch'])->name('profile.themeSwitch');
        Route::get('/impersonate/leave', [App\Http\Controllers\ProfileController::class, 'leaveImpersonation'])->name('profile.impersonate.leave');
    });
    
});

