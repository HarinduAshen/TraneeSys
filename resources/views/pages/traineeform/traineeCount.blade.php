@extends('layouts.mainlayout')

@section('title', 'Trainee Count')

@section('content')
<div class="container my-5">
    <h2>Trainee Count</h2>
    <!-- Add your Trainee Count content here -->

     <!-- Overview Section -->
     <!-- Overview Section -->
<div class="card-body">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h4 class="text-info">Overview</h4>
        </div>
    </div>

    <!-- Training Status -->
    <div class="row mb-3">
        <div class="col-6">
            <h5>Currently Training</h5>
        </div>
        <div class="col-6 text-right">
            <span class="badge badge-primary badge-pill" style="font-size: 1.2em;">{{ $studentsCurrentlyTraining }}</span>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <h5>General Students</h5>
        </div>
        <div class="col-6 text-right">
            <span class="badge badge-primary badge-pill" style="font-size: 1.2em;">{{ $generalStudentsCount }}</span>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <h5>Special Students</h5>
        </div>
        <div class="col-6 text-right">
            <span class="badge badge-primary badge-pill" style="font-size: 1.2em;">{{ $specialStudentsCount }}</span>
        </div>
    </div>
</div>


</div>
@endsection
