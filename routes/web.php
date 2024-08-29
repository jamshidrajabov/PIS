<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\DrugPeriodController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['no_route','auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    
    Route::get('/chat',[ChatController::class,'index'])->name('chat');
    Route::post('/chat',[ChatController::class,'store'])->name('chat.store');
    Route::get('/drugs',[DrugController::class,'index'])->name('drugs.index');
    Route::get('/drug/{id}', [DrugController::class, 'show'])->name('drug.about');
    Route::get('/patients/search', [AdminController::class, 'search'])->name('patients.search');
    // web.php
Route::get('/search-drug', [DrugController::class, 'search'])->name('search.drug');

});
Route::middleware(['auth','checkAdminOwnership'])->group(function () {
    Route::get('/{user_id}/mypatients',[PatientController::class,'index'])->name('mypatients');
    Route::get('/{user_id}/patient/{id}',[PatientController::class,'show'])->name('patient.about');
    Route::get('/{user_id}/mypatients/{id}/left',[PeriodController::class,'left'])->name('patient.left');
    Route::get('/{user_id}/mypatients/{id}/createperiod',[PeriodController::class,'create'])->name('period.create');
    Route::post('/{user_id}/mypatients/{id}/storeperiod',[PeriodController::class,'store'])->name('period.store');
    Route::get('/{user_id}/mypatients/{id}/edit',[PatientController::class,'edit'])->name('patient.edit');
    Route::put('/{user_id}/mypatients/{id}/update',[PatientController::class,'update'])->name('patient.update');
    Route::post('/{user_id}/store', [PatientController::class, 'store'])->name('patient.store');
    Route::post('/{user_id}/mypatients/{id}/drugstore', [DrugPeriodController::class, 'store'])->name('dynamic-input.store');
    Route::post('/{user_id}/mypatients/{id}/storediagnosis',[DiagnosisController::class,'store'])->name('diagnosis.store');
    Route::get('/{user_id}/colleagues',[UserController::class,'index'])->name('colleagues.index');
    Route::get('/{user_id}/mycurrentpatients',[PatientController::class,'currentindex'])->name('mycurrentpatients');
});

require __DIR__.'/auth.php';

Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/user/dashboard',[DashboardController::class,'userdashboard'])->middleware(['auth', 'verified'])->name('user.dashboard');



Route::middleware(['role_admin'])->group(function () {   
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('/patients',[PatientController::class,'patients'])->name('patients');
    Route::get('/hospitals',[HospitalController::class,'index'])->name('hospital.index');
    Route::get('/hospital/create',[HospitalController::class,'create'])->name('hospital.create');
    Route::get('/hospital/{id}/edit',[HospitalController::class,'edit'])->name('hospital.edit');
    Route::put('/hospital/{id}/update',[HospitalController::class,'update'])->name('hospital.update');
    Route::post('/hospitals/{user_id}/store',[HospitalController::class,'store'])->name('hospital.store');
    Route::get('/admin/dashboard',[DashboardController::class,'admindashboard'])->name('admin.dashboard');
    Route::get('/add',[AdminController::class,'create'])->name('admin.patient.create');
    Route::get('/users',[AdminController::class,'users'])->name('admin.users');
    Route::get('/{id}/addadmin',[AdminController::class,'addadmin'])->name('admin.addadmin');
    Route::get('/{id}/minusadmin',[AdminController::class,'minusadmin'])->name('admin.minusadmin');
    Route::delete('user/{id}/destroy',[AdminController::class,'destroy'])->name('admin.users.destroy');
    Route::get('/drugcreate',[DrugController::class,'create'])->name('drug.create');
    Route::post('/drugstore',[DrugController::class,'store'])->name('drug.store');
    Route::get('/drug/{id}/edit',[DrugController::class,'edit'])->name('drug.edit');
    Route::put('/drug/{id}/update',[DrugController::class,'update'])->name('drug.update');
    Route::delete('drug/{id}/destroy',[DrugController::class,'destroy'])->name('drug.destroy');

    Route::get('/categories/search', [CategoryController::class, 'search'])->name('categories.search');

    

});

// Route::middleware('role')->group()
