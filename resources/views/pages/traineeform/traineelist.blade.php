<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title','Trainee list')
@section('content')


<div class="container">
    <div class="row">
        <div class="container bpu-container">
            <h1> Trainee List 👩‍🏫</h1>
            <a href="{{ url('/generate-pdf') }}" style="display: inline-block; padding: 10px 20px; background-color: rgba(255, 1, 1, 0.998); color: white; border-radius: 15px; border: 2px solid #03fcf3; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-decoration: none; margin-right: 10px; transition: background-color 0.3s, border-color 0.3s;">
                PDF
            </a>
            <br><br>    
            <table class="table table-dark" style="width:100%;">
                <thead>
                    <tr>
                        <th>No</th> <!-- New column for Number -->
                        <th>Name</th>
                        <th>Registration No.</th>
                        <th>Division</th>
                        <th>Image</th>
                        <th>End Date</th>
                        <th>Remaining time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php $counter = 1; @endphp <!-- Initialize counter -->
                @foreach($trainees as $trainee)

                    
                

<tr>
<td>{{ $counter++ }}</td> <!-- Display counter and increment -->
<td>{{ $trainee->name }}</td>
<td>
<a href="{{ url('/showtrainee/' . $trainee->registration_number) }}">
    {{ $trainee->registration_number }}
</a>
</td>
<td>{{ $trainee->division->division_name ?? 'No Division' }}</td>
  
<td>
@if($trainee->image)
   <img src="{{ asset('storage/' . $trainee->image) }}" alt="Trainee Image" class="circular-image">

@else
    No image
@endif
</td>

<td>{{ $trainee->end_date }}</td>
<td>
@php
    $endDate = \Carbon\Carbon::parse($trainee->end_date);
    $now = \Carbon\Carbon::now();
    $diff = $endDate->diff($now);
    $diffInMonths = $diff->m + ($diff->y * 12);
    $isPast = $endDate->lt($now);
@endphp

@if ($isPast)
    @if ($diffInMonths > 0)
        {{ $diffInMonths }} months
    @endif
    @if ($diffInMonths > 0 && $diff->d > 0)
        ,
    @endif
    <span style="color: red; font-weight: bold;">*  -</span> <!-- Add an asterisk for past dates -->
    @if ($diff->d > 0)
        {{ $diff->d }} days
    @endif
    
@else
    @if ($diffInMonths > 0)
        {{ $diffInMonths }} months
    @endif
    @if ($diffInMonths > 0 && $diff->d > 0)
        ,
    @endif
    @if ($diff->d > 0)
        {{ $diff->d }} days
    @endif
@endif
</td>

<td>
<form method="POST" action="{{ route('trainees.delete', ['id' => $trainee->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
    <a href="{{ route('trainees.edit', $trainee->id) }}" class="btn btn-warning">Update</a>
</form>
</td>
</tr>
@endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>



@endsection