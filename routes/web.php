<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [UserDashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function(){

    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');

    Route::group([
        'prefix' => 'admin', 
        'middleware' => 'role:admin'
        ], function(){

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });

});


require __DIR__.'/auth.php';
