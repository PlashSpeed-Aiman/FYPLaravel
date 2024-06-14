<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authorize;
use Spatie\Permission\Middleware\RoleMiddleware;

Route::get('/login', [App\Http\Controllers\AccountController::class, 'index'])->name('loginpage');

Route::post('/login', [App\Http\Controllers\AccountController::class, 'login'])->name('login');

Route::get('/logout', [App\Http\Controllers\AccountController::class, 'logout'])->name('logout');

Route::get('/settings/user', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');

Route::get('/', function () {
    return view('home.index');
});

Route::get('/signup', [App\Http\Controllers\AccountController::class, 'signup'])->name('signup');

Route::group(['prefix'=>'admin','middleware'=>[\Spatie\Permission\Middleware\RoleMiddleware::using('admin')]], function(){
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/cases', [App\Http\Controllers\AdminController::class, 'cases'])->name('admin.cases');
    Route::get('/cases/{id}', [App\Http\Controllers\AdminController::class, 'case'])->name('admin.cases.case');
    Route::get('/appointments', [App\Http\Controllers\AdminController::class, 'appointments'])->name('admin.appointments');
    Route::get('/appointments/{id}/approve', [App\Http\Controllers\AdminController::class, 'approveAppointment'])->name('admin.appointments.approve');
    Route::get('/appointments/{id}/decline', [App\Http\Controllers\AdminController::class, 'declineAppointment'])->name('admin.appointments.decline');
    Route::get('/payments', [App\Http\Controllers\AdminController::class, 'payments'])->name('admin.payments');

});
Route::group(['prefix'=>'client','middleware'=>[\Spatie\Permission\Middleware\RoleMiddleware::using('client')]], function(){
    Route::get('/dashboard', [App\Http\Controllers\ClientController::class, 'index'])->name('client.dashboard');
    Route::get('/cases', [App\Http\Controllers\ClientController::class, 'cases'])->name('client.cases');
    Route::get('/cases/{id}', [App\Http\Controllers\ClientController::class, 'case'])->name('client.cases.case');
    Route::get('/appointments', [App\Http\Controllers\ClientController::class, 'appointments'])->name('client.appointments');
    Route::get('/appointments/request', [App\Http\Controllers\ClientController::class, 'requestAppointment'])->name('client.appointment.request');
    Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
    Route::get('/settings/change-password', function () {
        return view('client.change_password');
    });
    Route::get('/payments', [App\Http\Controllers\ClientController::class, 'index'])->name('client.payments');
});

Route::group(['prefix'=>'lawyer','middleware'=>[\Spatie\Permission\Middleware\RoleMiddleware::using('lawyer')]], function(){
    Route::get('/dashboard', [App\Http\Controllers\LawyerController::class, 'index'])->name('lawyer.dashboard');
    Route::group(['prefix'=>'clients'], function(){
        Route::get('/{id}', [App\Http\Controllers\LawyerController::class, 'client'])->name('lawyer.client');

    });
   Route::get('/appointments', [App\Http\Controllers\LawyerController::class, 'appointments'])->name('lawyer.appointments');
   Route::get('/settings', [App\Http\Controllers\LawyerController::class, 'settings'])->name('lawyer.settings');
   Route::get('/settings/change-password', function () {
        return view('lawyer.change_password');
    });
    Route::get('/payments', [App\Http\Controllers\LawyerController::class, 'index'])->name('lawyer.payments');
});


Route::get('/dashboard',function() {
    if (Auth::check()) {
        $auth = Auth::user();
        $user = App\Models\User::find($auth->id);
        if ( $user->hasRole('admin') ) {
            return redirect()->route('admin.dashboard');
        } else if ( $user->hasRole('client')) {
            return redirect()->route('client.dashboard');
        }
        else if ( $user->hasRole('lawyer')) {
            return redirect()->route('lawyer.dashboard');
        }

    }
    // return not found

    return redirect('/');
});



Route::get('/seed_user', function () {
    $user = new App\Models\User();
    $user->name = 'John Doe';
    $user->email = 'john@doe.com';
    $user->password = bcrypt('password');
    $user->save();
    return
        [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password'
        ];
});
