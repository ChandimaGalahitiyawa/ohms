<?php

use App\Models\Member;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;

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

// these are non-role routes
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

// auto logout if user goes to /dashboards
Route::get('/auto-logout', [App\Http\Controllers\AdminController::class, 'autoLogout'])->name('auto.logout');

// patient register routes
Route::controller(PatientController::class)->group(function () {
    Route::post('/createPatient', 'createPatient')->name('createPatient');
});
// these are role based routes
// admin routes
Route::prefix('admin')->middleware(['auth:sanctum', 'role:admin', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Admin Settings routes
    Route::controller(AdminController::class)->group(function () {
        // Dashboard routes
        Route::get('/dashboard', 'dashboard')->name('AdminDashboard');

        // Settins routes
        Route::get('/settings', 'AdminSettings')->name('AdminSettings');

        // Member Management routes
        Route::get('/users/members', 'MembersManagement')->name('MembersManagement');
        Route::get('/members/{id}/edit', 'edit')->name('edit_member');
        Route::delete('/members/{id}', 'deleteMember')->name('deleteMember');
        Route::post('/members/{id}/update', [MemberController::class, 'memberUpdate'])->name('memberUpdate');

        // Appointments Management routes
        Route::get('/appointments', 'AppointmentsManagement')->name('AppointmentsManagement');
        
        // Patient Management routes
        Route::get('/users/patients', 'PatientsManagement')->name('PatientsManagement');
        Route::get('/users/patients-add', 'PatientsManagementAdd')->name('PatientsManagementAdd');
        Route::delete('/patient/{id}', 'delete')->name('delete_member');

        // admin payments routes
        Route::get('/payments', 'AdminPayments')->name('AdminPayments');



    });

    // Member Registration routes
    Route::controller(MemberController::class)->group(function () {
        Route::post('/createMember', 'createMember')->name('createMember');
        Route::get('/users/members-add', 'MembersManagementAdd')->name('MembersManagementAdd');
    });

    // Centre Management routes
    Route::controller(CentreController::class)->group(function () {
        Route::get('/centres', 'CentresManagement')->name('CentresManagement');

        Route::get('/centre-add', 'CentresManagementAdd')->name('CentresManagementAdd');
        Route::post('/createCentre', 'createCentre')->name('createCentre');

        Route::get('/centres/{id}/edit', [CentreController::class, 'edit'])->name('edit_centre');
        Route::delete('/centres/{id}', [CentreController::class, 'delete'])->name('delete_centre');
        Route::post('/centres/{id}', [CentreController::class, 'update'])->name('update_centre');
    });
});


// member routes
Route::prefix('member')->middleware(['auth:sanctum', 'role:member', config('jetstream.auth_session'), 'verified',])->group(function () {

    // member dashboard routes
    Route::controller(MemberController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('MemberDashboard');

    // member profile routes
    Route::get('/settings', 'MemberSettings')->name('MemberSettings');

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

Route::controller(PaymentController::class)->group(function () {
    Route::post('/checkout', 'checkout')->name('checkout');
    Route::get('/stripe-success', 'stripeCheckoutSuccess')->name('stripe.checkout.success');
});

Route::prefix('patient')->middleware(['auth:sanctum', 'role:patient', config('jetstream.auth_session'), 'verified',])->group(function () {

    // user dashboard routes (avaliablity check)
    Route::controller(PatientController::class)->group(function () {
        Route::get('/dashboard', 'Patientdashboard')->name('PatientDashboard');
        Route::get('/search', 'MemberSearch')->name('MemberSearch');
        Route::post('/search', [PatientController::class, 'MemberSearch'])->name('member.search');
        Route::get('/channel ', 'ChannelDoctor')->name('ChannelDoctor');

        Route::get('find-bookings/{id}', 'findBookings')->name('findBookings');

        // patient profile routes
        Route::get('/settings', 'PatientSettings')->name('PatientSettings');

    });

    Route::controller(bookingController::class)->group(function () {
        Route::get('/channel-doctor/{id}', 'channelDoctor')->name('channelDoctor');
        Route::get('create-booking/{doctorId}/{centerId}/{date}', 'bookingBilling')->name('makeBooking');
        Route::get('confirm-booking/{doctorId}/{centerId}/{date}', 'confirmBilling')->name('confirmBooking');
        Route::get('payment-success', 'paymentSuccess')->name('payment.success');
        Route::get('payment-cancel', 'paymentCancel')->name('payment.cancel');
        Route::get('payment-notify', 'paymentNotify')->name('payment.notify');
        Route::get('my-bookings', 'myBookings')->name('myBookings');
    });
});