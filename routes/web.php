<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class , 'loginForm'])->name('login');
Route::post('/',[AuthController::class, 'login']);
Route::get('/register', [AuthController::class , 'registerForm']);
Route::post('/register', [AuthController::class , 'register'])->name('register');
Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);

Route::middleware(['auth','verified'])->group (function(){

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [AuthController::class, 'dashboard']);

    Route::get('/services', [ServiceController::class, 'index']);

    Route::middleware('can:manage_service')->group(function() {
        Route::get('/services/create', [ServiceController::class, 'create']);
        Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/services/edit/{service}', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/services/{service}', [ServiceController::class, 'destroy']);
    });


    Route::middleware('can:manage_patient')->group(function() {
        Route::get('/patient', [PatientController::class, 'index']);
        Route::get('/patient/create', [PatientController::class, 'create']);
        Route::post('/patient', [PatientController::class, 'store'])->name('patient.store');
        Route::get('/patient/edit/{patient}', [PatientController::class, 'edit'])->name('patient.edit');
        Route::put('/patient/{patient}', [PatientController::class, 'update'])->name('patient.update');
        Route::delete('/patient/{patient}', [PatientController::class, 'destroy']);
    });

    Route::get('/appointment', [AppointmentController::class, 'index']);
    Route::get('/appointment/create', [AppointmentController::class, 'create']);
    Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

    Route::middleware('can:manage_appointment')->group(function() {

        Route::get('/appointment/edit/{appointment}', [AppointmentController::class, 'edit'])->name('appointment.edit');
        Route::put('/appointment/{appointment}', [AppointmentController::class, 'update'])->name('appointment.update');
        Route::delete('/appointment/{appointment}', [AppointmentController::class, 'destroy']);
        Route::post('/appointment/accept/{appointment}', [AppointmentController::class, 'accept']);
        Route::post('/appointment/cancel/{appointment}', [AppointmentController::class, 'cancel']);

    });



    Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
});

