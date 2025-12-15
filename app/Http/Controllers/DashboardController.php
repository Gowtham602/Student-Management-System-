<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $studentCount = Student::count();
            $softdeleted = Student::onlyTrashed()->count();
        return view("dashboard.dashboard",compact('studentCount','softdeleted'));
    }
    
}
