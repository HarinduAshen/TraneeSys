@extends('layouts.mainlayout')
@section('title', 'Duration Update')
@section('content')
<div class="container">
  <div class="row">
    <div class="container bpu-container">
      <h1> Update Duration </h1>
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ config('custom.app.root') }}/updatedata">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="durationid">Duration ID</label>
              <input type="text" class="form-control" id="durationid" placeholder="Enter duration ID" name="durationid" value="{{ $singleuserdata->id }}" readonly>
            </div>
            <div class="form-group">
              <label for="durationname">Duration </label>
              <input type="text" class="form-control" id="durationname" placeholder="Enter duration name" name="durationname" value="{{ $singleuserdata->name }}" required>
            </div>
            <div class="form-group">
              <label for="durationnames">කාල සීමාව</label> <!-- Replace with appropriate label for duration names -->
              <input type="text" class="form-control" id="durationnames" placeholder="Enter duration names" name="durationnames" value="{{ $singleuserdata->names }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
