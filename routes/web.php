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
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/{workspace}', [App\Http\Controllers\WorkspaceController::class, 'dashboard'])->name('workspaces.dashboard');
    
    // Workspaces
    Route::group(['prefix' => 'workspaces'], function () {
        Route::get('/new', [App\Http\Controllers\WorkspaceController::class, 'new'])->name('workspaces.new');
        Route::get('/{workspace}/edit', [App\Http\Controllers\WorkspaceController::class, 'edit'])->name('workspaces.edit');
        Route::post('/save', [App\Http\Controllers\WorkspaceController::class, 'save'])->name('workspaces.save');
        Route::post('/update/{workspace}', [App\Http\Controllers\WorkspaceController::class, 'update'])->name('workspaces.update');
        Route::get('/delete/{workspace}', [App\Http\Controllers\WorkspaceController::class, 'delete'])->name('workspaces.delete');
    });
        
    
    // Profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::post('/password', [App\Http\Controllers\ProfileController::class, 'passwordUpdate'])->name('profile.password.update');
        Route::get('/theme-switch', [App\Http\Controllers\ProfileController::class, 'themeSwitch'])->name('profile.themeSwitch');
        Route::get('/impersonate/leave', [App\Http\Controllers\ProfileController::class, 'leaveImpersonation'])->name('profile.impersonate.leave');
    });
    
});

