<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PatientController;
use App\Models\Member;

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

// patient register routes
Route::controller(PatientController::class)->group(function () {
    Route::post('/createPatient', 'createPatient')->name('createPatient');
});

// // patient register routes
// Route::controller(MemberController::class)->group(function () {
//     Route::post('/createMember', 'createMember')->name('createMember');
//     Route::get('/users/members-add', 'MembersManagementAdd')->name('MembersManagementAdd');
// });


// admin routes
Route::prefix('admin')->middleware(['auth:sanctum', 'role:admin', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Admin Settings routes
    Route::controller(AdminController::class)->group(function () {
        // Dashboard routes
        Route::get('/dashboard', 'dashboard')->name('AdminDashboard');

        // admin dashboard routes
        Route::get('/settings/profile', 'AdminSettings')->name('AdminSettings');

        // Member Management routes
        Route::get('/users/members', 'MembersManagement')->name('MembersManagement');
        
        // Patient Management routes
        Route::get('/users/patients', 'PatientsManagement')->name('PatientsManagement');
        Route::get('/users/patients-add', 'PatientsManagementAdd')->name('PatientsManagementAdd');
    });

    // Member Registration routes
    Route::controller(MemberController::class)->group(function () {
        Route::post('/createMember', 'createMember')->name('createMember');
        Route::get('/users/members-add', 'MembersManagementAdd')->name('MembersManagementAdd');
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
Route::prefix('patient')->middleware(['auth:sanctum', 'role:patient', config('jetstream.auth_session'), 'verified',])->group(function () {

    // user dashboard routes
    Route::controller(PatientController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('PatientDashboard');
    });

});