<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class studentController extends Controller
{
    //
    public function index (Request $request){
        return view('students.index');
    }

    public function store(Request $request)
    {
        // dd($request,"___dd");
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:students,email',
            'dob'        => 'nullable|date',
            'phone'      => 'nullable|string|max:20',
            'class'      => 'required|string|max:50',
            'section'    => 'nullable|string|max:50',
            'address'    => 'required|string',
        ]);

        $student = Student::create($validated);

        return response()->json([
            'message' => 'Student created successfully!',
            'student' => $student
        ], 200);
    }

    public function data(){
        $student = student::all();
        return response()->json([
            'message'=>'data fetch successfully',
            'data' =>$student
        ],status: 200);
    }
    //edit 
    public function edit ($id){
      return  $student = student::findOrFail($id);

    }
    //updates the student details 
    public function studentUpdate(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'email'      => 'required|email|unique:students,email,' . $id,
        'dob'        => 'nullable|date',
        'phone'      => 'nullable|string|max:20',
        // 'class'      => 'required|string|max:50',
        // 'section'    => 'nullable|string|max:50',
        'address'    => 'required|string',
    ]);

    // update student
    $student->update($validated);

    return response()->json([
        'message' => 'Student updated successfully!',
        'student' => $student
    ], 200);
}


    public function delete($id){
        $student =student::find($id);
        if (!$student) {
        return response()->json(['message' => 'Student not found'], 404);
        }
        $student->delete();
        return response()->json([
            'message'=>'student deleted successfully'
        ],status:200);

    }
}
