<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolPermisoController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;



Route::get('/',[WelcomeController::class,'index'])->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {


    // dashboard
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    // perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // roles y permisos
    Route::resource('rol-permisos', RolPermisoController::class);
    Route::put('/rol/{id_rol}/permisos', [RolPermisoController::class, 'actualizarPermisosRol'])->name('rol-permisos.actualizar');


});

require __DIR__.'/auth.php';
