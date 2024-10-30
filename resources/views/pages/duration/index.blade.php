@extends('layouts.mainlayout')

@section('title', 'Select Duration')

@section('content')

<div class="container my-5">
    <div class="form-group">
        <label for="duration">Select Duration:</label>
        <select class="form-control" id="duration_id" name="duration_id" required>
            <option value="">Select Duration</option>
            @foreach($durations as $duration)
                <option value="{{ $duration->id }}">{{ $duration->name }}</option>
            @endforeach
        </select>
    </div>

    <div id="trainee-data" class="mt-4"></div>

    <script>
       document.getElementById('duration_id').addEventListener('change', function() {
    var durationId = this.value;
    var divisionId = "{{ $divisionId }}"; // Passed from the view

    if (durationId && divisionId) {
        fetch(`/get-trainees?duration_id=${durationId}&division_id=${divisionId}`)
            .then(response => response.json())
            .then(data => {
                var traineeDataDiv = document.getElementById('trainee-data');
                traineeDataDiv.innerHTML = '<h3>Trainees</h3>';

                // Check if any trainees were returned
                if (data.length === 0 || data.message) {
                    traineeDataDiv.innerHTML += `<p>No trainees found for the selected duration and division.</p>`;
                } else {
                    data.forEach(function(trainee) {
                        traineeDataDiv.innerHTML += `<p>Name: ${trainee.name}, Registration: ${trainee.registration_number}</p>`;
                    });
                }
            })
            .catch(error => {
                console.error('Error fetching trainee data:', error);
            });
    }
});

    </script>
</div>

@endsection
