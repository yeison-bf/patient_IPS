<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    // Users
    Route::get('/profile/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile');
    Route::get('/profile/{id}/user', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');


    //Patiens
    Route::get('/patients', [App\Http\Controllers\PatiensController::class, 'index'])->name('patiens.list');
    Route::get('/patientsPost', [App\Http\Controllers\PatiensController::class, 'showRegister'])->name('show.register');
    Route::post('/patientsPost', [App\Http\Controllers\PatiensController::class, 'register'])->name('patients.register');
    Route::get('/patientEdit/{id}', [App\Http\Controllers\PatiensController::class, 'showEdit'])->name('show.update');
    Route::post('/patientEdit/{id}', [App\Http\Controllers\PatiensController::class, 'update'])->name('patients.update');

    Route::get('/history/{id}', [App\Http\Controllers\PatiensController::class, 'history'])->name('patiens.history');


    Route::put('/patientActive/{id}', [App\Http\Controllers\PatiensController::class, 'activePatient'])->name('patiens.active');


    //Especialistas
    Route::get('/specialists', [App\Http\Controllers\SpecialistsController::class, 'index'])->name('specialists.list');

});
