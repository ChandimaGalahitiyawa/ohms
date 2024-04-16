<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\member\MemberController;

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

// public routes
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// admin routes
Route::prefix('admin')->middleware(['auth:sanctum', 'role:admin', config('jetstream.auth_session'), 'verified',])->group(function () {

    // admin dashboard routes
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('AdminDashboard');
    });

});

// member routes
Route::prefix('member')->middleware(['auth:sanctum', 'role:member', config('jetstream.auth_session'), 'verified',])->group(function () {

    // member dashboard routes
    Route::controller(MemberController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('MemberDashboard');
    });

});

// user routes
Route::prefix('user')->middleware(['auth:sanctum', 'role:user', config('jetstream.auth_session'), 'verified',])->group(function () {

    // user dashboard routes
    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('UserDashboard');
    });

});