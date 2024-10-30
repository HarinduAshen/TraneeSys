@extends('layouts.mainlayout')

@section('title', 'University')

@section('content')

<br><br><br><br>

<!-- University Selection -->
<div class="form-group">
    <label for="university">University</label>
    <select class="form-control" id="university_id" name="university_id" required>
        <option value="">Select University</option>
        @foreach($universities as $university)
            <option value="{{ $university->id }}">{{ $university->name }}</option>
        @endforeach
    </select>
</div>


<!-- This div will display the relevant trainees for the selected university -->
<div id="trainee-data" class="table-responsive">
    <!-- Trainee data will be displayed here -->
</div>

<script>
    // Fetch trainees when a university is selected
    document.getElementById('university_id').addEventListener('change', function() {
        var universityId = this.value;
        var divisionId = new URLSearchParams(window.location.search).get('division_id');

        if (universityId && divisionId) {
            fetch(`/get-trainees?university_id=${universityId}&division_id=${divisionId}`)
                .then(response => response.json())
                .then(data => {
                    // Display trainees relevant to the selected university and division
                    var traineeDataDiv = document.getElementById('trainee-data');
                    
                    // Create a table structure for a professional look
                    traineeDataDiv.innerHTML = `
                        <h3>Trainees</h3>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Registration Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${data.map(trainee => `
                                    <tr>
                                        <td>${trainee.name}</td>
                                        <td>${trainee.registration_number}</td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    `;
                })
                .catch(error => {
                    console.error('Error fetching trainee data:', error);
                });
        }
    });
</script>

@endsection
