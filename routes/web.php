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
    
    // Workspaces
    Route::group(['prefix' => 'workspaces'], function () {
        Route::get('/switch/{workspace}', [App\Http\Controllers\WorkspaceController::class, 'switch'])->name('workspaces.switch');
        Route::get('/new', [App\Http\Controllers\WorkspaceController::class, 'new'])->name('workspaces.new');
        Route::post('/save', [App\Http\Controllers\WorkspaceController::class, 'save'])->name('workspaces.save');
    });

    // Workspace
    Route::group(['prefix' => '{workspace}'], function () {
        Route::get('/', [App\Http\Controllers\WorkspaceController::class, 'dashboard'])->name('workspaces.dashboard');
        Route::get('/edit', [App\Http\Controllers\WorkspaceController::class, 'edit'])->name('workspaces.edit');
        Route::post('/update', [App\Http\Controllers\WorkspaceController::class, 'update'])->name('workspaces.update');
        Route::get('/delete', [App\Http\Controllers\WorkspaceController::class, 'delete'])->name('workspaces.delete');

        // Projects
        Route::group(['prefix' => 'projects'], function () {
            Route::get('/', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
            Route::get('/new', [App\Http\Controllers\ProjectController::class, 'new'])->name('projects.new');
            Route::post('/save', [App\Http\Controllers\ProjectController::class, 'save'])->name('projects.save');
            Route::get('/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
            Route::post('/{project}/update', [App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
            Route::get('/{project}/delete', [App\Http\Controllers\ProjectController::class, 'delete'])->name('projects.delete');
        });

        // Reports
        Route::group(['prefix' => 'reports'], function () {
            Route::get('/', [App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
        });
        
        // Projects
        Route::group(['prefix' => 'projects'], function () {
            Route::get('/', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
            Route::get('/new', [App\Http\Controllers\ProjectController::class, 'new'])->name('projects.new');
            Route::post('/save', [App\Http\Controllers\ProjectController::class, 'save'])->name('projects.save');
            Route::get('/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
            Route::post('/{project}/update', [App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
            Route::get('/{project}/delete', [App\Http\Controllers\ProjectController::class, 'delete'])->name('projects.delete');
        });

        // Tasks
        Route::group(['prefix' => 'tasks'], function () {
            Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
            Route::get('/new', [App\Http\Controllers\TaskController::class, 'new'])->name('tasks.new');
            Route::post('/save', [App\Http\Controllers\TaskController::class, 'save'])->name('tasks.save');
            Route::get('/{task}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');
            Route::post('/{task}/update', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
            Route::get('/{task}/delete', [App\Http\Controllers\TaskController::class, 'delete'])->name('tasks.delete');
        });

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

