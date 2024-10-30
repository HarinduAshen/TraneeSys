@extends('layouts.mainlayout')
@section('title','Uniorinstitute Update')
@section('content')
<div class="container">
  <div class="row">
    <div class="container  bpu-container">
      <h1> University Update</h1>
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ url('/updateunidata')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label for="uniorinstituteid">University ID</label>
              <input type="text" class="form-control" id="uniorinstituteid" placeholder="Enter University or institute Name" name="uniorinstituteid" value="{{$singleuserdata->id}}" Readonly>
            </div>
            <div class="form-group">
              <label for="uniorinstitutename">University Name</label>
              <input type="text" class="form-control" id="uniorinstitutename" placeholder="Enter username" name="uniorinstitutename" value="{{$singleuserdata->name}}" required>
            </div>
            <div class="form-group">
              <label for="uniorinstitutename">විශ්වවිද්‍යාලයේ නම</label>
              <input type="text" class="form-control" id="uniorinstitutenames" placeholder="Enter username" name="uniorinstitutenames" value="{{$singleuserdata->names}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
