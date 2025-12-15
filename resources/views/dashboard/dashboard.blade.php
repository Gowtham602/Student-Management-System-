@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-card card p-3 text-white mb-3 d-flex flex-column justify-content-center align-items-center"
     style="width: 250px; height: 150px;">
    <i class="bi bi-people-fill" style="font-size:40px;"></i>
    <h4>Total Students</h4>
    <h2>{{ $studentCount }}</h2>
</div>

<div class="dashboard-card card p-3 bg-danger text-white mb-3 d-flex flex-column justify-content-center align-items-center"
     style="width: 250px; height: 150px;">
    <i class="bi bi-trash-fill" style="font-size:40px;"></i>
    <h4>Deleted Students</h4>
    <h2>{{ $softdeleted }}</h2>
</div>


@endsection
