@extends('layouts.mainlayout')

@section('title','Trainee Summary')

@section('content')
<br><br><br>

        
<div class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title" align="center">Trainee Summary</h3>
                </div>
                <br><br>

                <!-- Division Filter -->
                <div class="row mb-3">
                    <div class="col-12">
                        <form method="GET" action="{{ route('trainees.summary') }}">
                            <div class="form-group">
                                <label for="division"><b>  Select Division:</b></label>
                                <select class="form-control" id="division_id" name="division_id" onchange="this.form.submit()">
                                    <option value="">Select Division</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->division_id }}" {{ request()->division_id == $division->division_id ? 'selected' : '' }}>
                                            {{ $division->division_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Action Buttons -->
               <!-- Action Buttons -->
<div class="row mt-4">
    <div class="col-12 text-center">
        @if(request('division_id'))
            <a href="{{ route('trainee.details', ['division_id' => request('division_id')]) }}" class="btn btn-outline-info mr-2">View Trainees</a>
            <a href="{{ route('trainee.count', ['division_id' => request('division_id')]) }}" class="btn btn-outline-info mr-2">Trainee Count</a>

            <!-- University Button -->
            <a href="{{ route('universities.index', ['division_id' => request('division_id')]) }}" class="btn btn-outline-info mr-2">University</a>

           

        @else
            <p>Please select a division to view details.</p>
        @endif
    </div>
</div>

                <br><br><br>
            </div>
        </div>
    </div>
</div>
        
@endsection
