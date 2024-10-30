@extends('layouts.mainlayout')
@section('title', 'Trainee Details')
@section('content')
<div class="container">
  <div class="row">
    <div class="container bpu-container">
            <h1> Trainee Details 👩‍🏫</h1>
            
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
