

@extends('layouts.app')

@section('title', 'Students')

@section('content')

<h3 class="text-success text-center mb-4">Student Management System</h3>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Student List</h4>

    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createStudentModal">
        Create Student
    </button>
</div>

@include('students.table')
@include('students.editstudent')
@include('students.createstudent')

@endsection

@push('scripts')
<script>
    const createStudentUrl = "{{ route('student.store') }}";
    const studentsDataUrl = "{{ route('student.data') }}";
     toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "3000"
    };

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        }
    });
</script>

<!-- <script src="{{ asset('js/student.js') }}"></script> -->
@endpush
