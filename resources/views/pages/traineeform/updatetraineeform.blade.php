
<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title', 'Update Trainee')
@section('content')
<div class="container">
    <div class="row">
        <div class="container bpu-container">
            <h1>Update Trainee Details</h1>
            <div class="row">
                <div class="col-md-12 text-left">
                    <form method="post" action="{{ route('trainees.update', $trainee->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $trainee->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $trainee->address }}" required>
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $trainee->birthday }}" required>
                        </div>
                        <div class="form-group">
                            <label for="registration_number">Registration Number</label>
                            <input type="text" class="form-control" id="registration_number" name="registration_number" value="{{ $trainee->registration_number }}" required>

                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">Select Gender</option>

                               
                                {{-- <option value="female">Female</option>
                                <option value="other">Other</option> --}}

                                <option value="male" {{ $trainee->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $trainee->gender == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ $trainee->gender == 'other' ? 'selected' : '' }}>Other</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <select class="form-control" id="duration_id" name="duration_id" required>
                                <option value="">Select Duration</option>
                                @foreach($durations as $duration)
                   
                                   
                                    <option value="{{ $duration->id }}" {{ $trainee->duration_id == $duration->id ? 'selected' : '' }}>{{ $duration->name }}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="university">University</label>
                            <select class="form-control" id="university_id" name="university_id" required>
                                <option value="">Select University</option>
                                @foreach($universities as $university)

                                   
                                    <option value="{{ $university->id }}" {{ $trainee->university_id == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="degree">Degree</label>
                            <select class="form-control" id="degree_id" name="degree_id" required>
                                <option value="">Select Degree</option>
                                @foreach($degrees as $degree)

                                    

                                    <option value="{{ $degree->id }}" {{ $trainee->degree_id == $degree->id ? 'selected' : '' }}>{{ $degree->dname }}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="supervisor">Supervisor</label>
                            <select class="form-control" id="supervisor_id" name="supervisor_id" required>
                                <option value="">Select Supervisor</option>
                                @foreach($supervisors as $supervisor)

                                    

                                    <option value="{{ $supervisor->id }}" {{ $trainee->supervisor_id == $supervisor->id ? 'selected' : '' }}>{{ $supervisor->name }}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{$trainee->start_date}}" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $trainee->end_date }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ $trainee->phone_number }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nic">NIC</label>
                            <input type="text" class="form-control" id="nic" name="nic" value="{{ $trainee->nic }}" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Trainee Photo</label>
                            @if($trainee->image)
                                <div>
                                    <img src="{{ asset('storage/' . $trainee->image) }}" alt="Trainee Image" class="circular-image">
                                    <p>Current Image</p>
                                </div>
                            @endif
                            <input type="file" name="image" class="form-control" id="image" value="{{ $trainee->image }}" >
                        </div>

                        
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $trainee->email }}">
                        </div>

                        <input type="submit" class="btn btn-primary" value="UPDATE">
                        <a href="{{ url('/trainees') }}" class="btn btn-warning">CANCEL</a>
                        <br> <br>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection











