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
        Route::post('/documents', [App\Http\Controllers\API\ClientController::class, 'uploadDocument'])->name('client.document.upload');
        Route::delete('/documents/{document_id}', [App\Http\Controllers\API\ClientController::class, 'deleteDocument'])->name('client.document.delete');
        Route::post('/invoices/{invoice_id}/payments', [App\Http\Controllers\API\ClientController::class, 'makePayment'])->name('client.invoice.payment');
    });
    // lawyer upload document
    // group into lawyers
    Route::group(['prefix'=>'lawyers'], function(){
        Route::post('/documents', [App\Http\Controllers\API\LawyerController::class, 'uploadDocument'])->name('lawyer.document.upload');
        Route::delete('/documents/{document_id}', [App\Http\Controllers\API\LawyerController::class, 'deleteDocument'])->name('lawyer.document.delete');
    });
    Route::group(['prefix'=>'admin'], function(){
        Route::post('/clients', [App\Http\Controllers\API\AdminController::class, 'addClient'])->name('admin.client.add');
        Route::post('/clients/{client_id}/cases', [App\Http\Controllers\API\AdminController::class, 'addCase'])->name('admin.client.case.add');
        Route::post('/clients/{client_id}/invoices', [App\Http\Controllers\API\AdminController::class, 'addInvoice'])->name('admin.client.invoice.add');
    });

});

Route::post('/register', [App\Http\Controllers\API\AccountController::class, 'register'])->name('register');

