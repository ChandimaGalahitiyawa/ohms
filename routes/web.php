<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CentreController;
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

// auto logout
Route::get('/auto-logout', [App\Http\Controllers\AdminController::class, 'autoLogout'])->name('auto.logout');


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

        // Settins routes
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

    // Centre Management routes
    Route::controller(CentreController::class)->group(function () {
        Route::post('/createCentre', 'createCentre')->name('createCentre');
        Route::get('/centres', 'CentresManagement')->name('CentresManagement');
        Route::get('/centre-add', 'CentresManagementAdd')->name('CentresManagementAdd');
        Route::put('/centres/{id}', [CentreController::class, 'update'])->name('update_centre');
        Route::get('/centres/{id}/edit', [CentreController::class, 'edit'])->name('edit_centre');
        Route::delete('/centres/{id}', [CentreController::class, 'delete'])->name('delete_centre');
    });
});


// member routes
Route::prefix('member')->middleware(['auth:sanctum', 'role:member', config('jetstream.auth_session'), 'verified',])->group(function () {

    // member dashboard routes
    Route::controller(MemberController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('MemberDashboard');

    // member profile routes
    Route::get('/settings/profile', 'MemberSettings')->name('MemberSettings');

    // add avalability routes
    Route::post('/createWeeklyAvailability', 'createWeeklyAvailability')->name('createWeeklyAvailability');
    Route::post('/createSpecificAvailability', 'createSpecificAvailability')->name('createSpecificAvailability');
    Route::get('/availability', 'MemberAvailability')->name('MemberAvailability');   
    Route::get('/availability-add', 'MemberAvailabilityAdd')->name('MemberAvailabilityAdd');   

    // specialization routes
    Route::get('/specializations', 'MemberSpecializations')->name('MemberSpecializations');
    Route::get('/specializations-add', 'MemberSpecializationsAdd')->name('MemberSpecializationsAdd');
    Route::post('/createSpecialization', 'createSpecialization')->name('createSpecialization');

    });
    
});

// user routes
Route::prefix('patient')->middleware(['auth:sanctum', 'role:patient', config('jetstream.auth_session'), 'verified',])->group(function () {

    // user dashboard routes (avaliablity check)
    Route::controller(PatientController::class)->group(function () {
        Route::get('/dashboard', 'Patientdashboard')->name('PatientDashboard');
        Route::get('/search', 'MemberSearch')->name('MemberSearch');
        Route::post('/search', [PatientController::class, 'MemberSearch'])->name('member.search');

    // patient profile routes
    Route::get('/settings/profile', 'PatientSettings')->name('PatientSettings');

    // appointment routes
    Route::post('/createAppointments', 'createAppointments')->name('createAppointments');
    Route::get('/appointments', 'AppointmentsCreate')->name('AppointmentsCreate');   

    });

});