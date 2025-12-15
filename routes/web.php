<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;

Route::get('/', function () {
    return view('students.index');
});
Route::get('/student',[studentController::class,'index'])->name('student.index');
Route::post('/student/store',[studentController::class,'store'])->name('student.store');
Route::get('/student/data',[studentController::class,'data'])->name('student.data');
Route::delete('/student/delete/{id}',[studentController::class,'delete'])->name('student.delete');
Route::get('/student/edit/{id}',[studentController::class,'edit'])->name('student.edit');
Route::put('/student/update/{id}',[studentController::class,'studentUpdate'])->name('student.update');
Route::get("/dashboard",[DashboardController::class,'index'])->name('dashboard.index');
// Route::get("/student/softdeleted",[DashboardController::class,'softdeleted'])->name('dashboard.softdeleted');



