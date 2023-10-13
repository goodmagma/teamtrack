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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


/**
 * User Routes
 */
Route::group(['middleware' => ['auth']], function () {
    
    // Dashboard
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    // Profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::post('/password', [App\Http\Controllers\ProfileController::class, 'passwordUpdate'])->name('profile.password.update');
        Route::get('/theme-switch', [App\Http\Controllers\ProfileController::class, 'themeSwitch'])->name('profile.themeSwitch');
    });
    
});