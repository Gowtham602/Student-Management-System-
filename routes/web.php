<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index');

Route::get('/student', [StudentController::class, 'index'])
    ->name('student.index');

Route::post('/student/store', [StudentController::class, 'store'])
    ->name('student.store');

Route::get('/student/data', [StudentController::class, 'data'])
    ->name('student.data');

Route::get('/student/edit/{id}', [StudentController::class, 'edit'])
    ->name('student.edit');

Route::put('/student/update/{id}', [StudentController::class, 'studentUpdate'])
    ->name('student.update');

Route::delete('/student/delete/{id}', [StudentController::class, 'delete'])
    ->name('student.delete');
