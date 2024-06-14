<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'web','prefix' => 'v1'], function () {
    Route::post('/register', [App\Http\Controllers\API\AccountController::class, 'register'])->name('register');
    // client create appointment
    // group into clients
    Route::group(['prefix'=>'clients'], function(){
        Route::post('/appointments', [App\Http\Controllers\API\AppointmentController::class, 'store'])->name('client.appointment.store');
        Route::get('/test', [App\Http\Controllers\API\AppointmentController::class, 'store']);
        Route::get('/', [App\Http\Controllers\API\ClientController::class, 'index']);
    });
    // lawyer upload document
    // group into lawyers
    Route::group(['prefix'=>'lawyers'], function(){
        Route::post('/documents', [App\Http\Controllers\API\LawyerController::class, 'uploadDocument'])->name('lawyer.document.upload');

    });

});

Route::post('/register', [App\Http\Controllers\API\AccountController::class, 'register'])->name('register');

