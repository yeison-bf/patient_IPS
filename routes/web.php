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
    Route::post('/patientsPost', [App\Http\Controllers\PatiensController::class, 'store'])->name('patients.register');
    Route::put('/patientEdit/{id}', [App\Http\Controllers\PatiensController::class, 'edit'])->name('patiens.update');

});
