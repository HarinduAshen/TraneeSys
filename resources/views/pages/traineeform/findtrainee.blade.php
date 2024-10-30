@extends('layouts.mainlayout')
@section('title', 'Find Trainee')
@section('content')
<div class="container">
    <div class="row">
        <div class="container bpu-container">
            <h1>Find Trainee</h1>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form method="post" action="{{ route('trainees.findTrainee') }}">
                @csrf
                <div class="form-group">
                    <label for="registration_number">Registration Number</label>
                    <input type="text" class="form-control" id="registration_number" name="registration_number" required>
                </div>
                <input type="submit" class="btn btn-primary" value="Search">
            </form>
        </div>
    </div>
</div>
@endsection
