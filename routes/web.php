<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeecontroller;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    // Employee Routes
    Route::get('employee', [employeecontroller::class, 'index'])->name('employee.index');
    Route::get('employee/create', [employeecontroller::class, 'create'])->name('employee.create');
    Route::post('employee', [employeecontroller::class, 'store'])->name('employee.store');
    Route::get('employee/{id}/edit', [employeecontroller::class, 'edit'])->name('employee.edit');
    Route::put('employee/{id}/edit', [employeecontroller::class, 'update'])->name('employee.update');
    Route::get('employee/{id}', [employeecontroller::class, 'destroy'])->name('employee.destroy');

    // Optional custom delete view route (not typical in REST)
    // Route::get('employee/{id}/delete', [employeecontroller::class, 'delete'])->name('employee.delete');

    // Profile routes
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

