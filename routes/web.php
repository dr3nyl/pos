<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::middleware('auth')->group(function(){

    Route::group([
        'prefix' => 'admin', 
        'middleware' => 
        'isAdmin'
        ], function(){

        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });

    Route::group([
        'prefix' => 'user'
        ], function(){

        Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    });
    
});


require __DIR__.'/auth.php';
