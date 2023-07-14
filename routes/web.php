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
    Route::get('/patientsPost', [App\Http\Controllers\PatiensController::class, 'showRegister'])->name('patient.show.register');
    Route::post('/patientsPost', [App\Http\Controllers\PatiensController::class, 'register'])->name('patients.register');
    Route::get('/patientEdit/{id}', [App\Http\Controllers\PatiensController::class, 'showEdit'])->name('show.update');
    Route::post('/patientEdit/{id}', [App\Http\Controllers\PatiensController::class, 'update'])->name('patients.update');

    Route::get('/history/{id}', [App\Http\Controllers\PatiensController::class, 'history'])->name('patiens.history'); //Falta
    Route::put('/patientActive/{id}', [App\Http\Controllers\PatiensController::class, 'activePatient'])->name('patiens.active');


    //Especialistas
    Route::get('/specialists', [App\Http\Controllers\SpecialistsController::class, 'index'])->name('specialists.list');
    Route::get('/specialistsPost', [App\Http\Controllers\SpecialistsController::class, 'showRegister'])->name('show.registerEsp');
    Route::post('/specialists', [App\Http\Controllers\SpecialistsController::class, 'create'])->name('specialists.registerEsp');
    Route::get('/especislists/{id}', [App\Http\Controllers\SpecialistsController::class, 'showEdit'])->name('specialists.show.edit');
    Route::post('/especislists/{id}', [App\Http\Controllers\SpecialistsController::class, 'update'])->name('specialists.update');

    Route::put('/especialistActive/{id}', [App\Http\Controllers\SpecialistsController::class, 'activeSpecialist'])->name('specialists.active');


    //Roles
    Route::get('/roles', [App\Http\Controllers\RolesPermissionsController::class, 'index'])->name('roles.list');
    Route::post('/roles', [App\Http\Controllers\RolesPermissionsController::class, 'create'])->name('roles.post');
    Route::post('/rolesEditar', [App\Http\Controllers\RolesPermissionsController::class, 'update'])->name('roles.update');


    //Profesiones
    Route::get('/professions', [App\Http\Controllers\ProfessionController::class, 'index'])->name('professions.list');
    Route::post('/professions', [App\Http\Controllers\ProfessionController::class, 'create'])->name('professions.register');
    Route::post('/professionsUpdate', [App\Http\Controllers\ProfessionController::class, 'update'])->name('professions.update');

});
