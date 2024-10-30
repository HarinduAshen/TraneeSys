@extends('layouts.mainlayout')
@section('title', 'Trainee Details')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <!-- Trainee Image -->
                    @if($trainee->image)
                        <img src="{{ asset('storage/' . $trainee->image) }}" alt="Trainee Image" class="img-fluid rounded-circle mb-4" style="width: 150px; height: 150px;" id="traineeImage">
                    @endif
                    <h2 class="card-title mb-4">{{ $trainee->name }}</h2>

                    <!-- Trainee Details Form -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="registration_number" class="form-label"><i class="fas fa-id-badge"></i> Registration Number</label>
                            <input type="text" class="form-control" id="registration_number" value="{{ $trainee->registration_number }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="birthday" class="form-label"><i class="fas fa-calendar-alt"></i> Birthday</label>
                            <input type="date" class="form-control" id="birthday" value="{{ $trainee->birthday }}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label"><i class="fas fa-venus-mars"></i> Gender</label>
                            <input type="text" class="form-control" id="gender" value="{{ $trainee->gender }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone_number" class="form-label"><i class="fas fa-phone"></i> Phone Number</label>
                            <input type="tel" class="form-control" id="phone_number" value="{{ $trainee->phone_number }}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="address" class="form-label"><i class="fas fa-map-marker-alt"></i> Address</label>
                            <input type="text" class="form-control" id="address" value="{{ $trainee->address }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nic" class="form-label"><i class="fas fa-id-card"></i> NIC</label>
                            <input type="text" class="form-control" id="nic" value="{{ $trainee->nic }}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="university" class="form-label"><i class="fas fa-university"></i> University</label>
                            <input type="text" class="form-control" id="university" value="{{ optional($trainee->university)->name }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="degree" class="form-label"><i class="fas fa-graduation-cap"></i> Degree</label>
                            <input type="text" class="form-control" id="degree" value="{{ optional($trainee->degree)->dname }}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="supervisor" class="form-label"><i class="fas fa-user-tie"></i> Supervisor</label>
                            <input type="text" class="form-control" id="supervisor" value="{{ optional($trainee->supervisor)->name }}" disabled>
                        </div>


                   
                                    
                        <div class="col-md-6 mb-3">
                            <label for="duration" class="form-label"><i class="fas fa-hourglass-half"></i> Duration</label>
                            <input type="text" class="form-control" id="duration" value="{{ optional($trainee->duration)->name }}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="start_date" class="form-label"><i class="fas fa-calendar-day"></i> Start Date</label>
                            <input type="date" class="form-control" id="start_date" value="{{ $trainee->start_date }}" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="end_date" class="form-label"><i class="fas fa-calendar-check"></i> End Date</label>
                            <input type="date" class="form-control" id="end_date" value="{{ $trainee->end_date }}" disabled>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $trainee->email }}" disabled>
                    </div>

                    <a href="{{ url('/findtrainee') }}" class="btn btn-primary mt-3"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
          <img src="" id="modalImage" class="img-fluid" alt="Trainee Image">
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('traineeImage').addEventListener('click', function() {
        var imageSrc = this.src;
        document.getElementById('modalImage').src = imageSrc;
        var imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
        imageModal.show();
    });
</script>


@endsection
