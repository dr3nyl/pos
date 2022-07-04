<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserDashboardController;
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

Route::get('/', function(){

    return view('welcome');
});

Route::middleware('auth')->group(function(){

    Route::group([
        'prefix' => 'admin', 
        'middleware' => 'role:admin'
        ], function(){

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });

    Route::group([
        'prefix' => 'user',
        'middleware' => 'role:user'
        ], function(){

        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    });
    
});


require __DIR__.'/auth.php';
