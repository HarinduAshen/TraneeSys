<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title','Trainee Form')
@section('content')
<div class="container">
    <div class="row">
        <div class="container bpu-container">
            <h1> Trainee Details 👩‍🏫</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            

            <div class="row">
                <div class="col-md-12 text-left">
                    <form method="post" action="{{ url('/trainees') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name here" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address here">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" required>
                        </div>
                        <div class="form-group">
                            <label for="registration_number">Registration Number</label>
                            <input type="text" class="form-control" id="registration_number" name="registration_number" placeholder="Enter registration number here">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <select class="form-control" id="duration_id" name="duration_id" required>
                                <option value="">Select Duration</option>
                                @foreach($durations as $duration)
                                    <option value="{{ $duration->id }}">{{ $duration->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="university">University</label>
                            <select class="form-control" id="university_id" name="university_id" required>
                                <option value="">Select University</option>
                                @foreach($universities as $university)
                                    <option value="{{ $university->id }}">{{ $university->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="degree">Degree</label>
                            <select class="form-control" id="degree_id" name="degree_id" required>
                                <option value="">Select Degree</option>
                                @foreach($degrees as $degree)
                                    <option value="{{ $degree->id }}">{{ $degree->dname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="supervisor">Supervisor</label>
                            <select class="form-control" id="supervisor_id" name="supervisor_id" required>
                                <option value="">Select Supervisor</option>
                                @foreach($supervisors as $supervisor)
                                    <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="division">Division</label>
                            <select class="form-control" id="division_id" name="division_id" required>
                                <option value="">Select Division</option>
                                @foreach($divisions as $division)
                                    <option value="{{ $division->division_id }}">{{ $division->division_name }}</option>
                                @endforeach
                            </select>
                        </div>



<label class="form-group">Category Type: </label>
        <div class="col-sm-9">

        <label>General</label>
        <input type="radio" name="type" value="General" id="gen">
        <label>Special</label>
        <input type="radio" name="type" value="Special" id="spe" >

       ( Default One is General )
    </div>



                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Enter phone number here">
                        </div>
                        <div class="form-group">
                            <label for="nic">NIC</label>
                            <input type="text" class="form-control" id="nic" name="nic" placeholder="Enter NIC here">
                        </div>

                        <div class="form-group">
                            <label for="image">Trainee Photo</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email here">
                        </div>

                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                        <br> <br>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>



   


@endsection
