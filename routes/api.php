<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Get all students
Route::get('/students', [StudentController::class, 'index']);
