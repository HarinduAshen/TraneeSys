@extends('layouts.mainlayout')
@section('title', 'Supervisor Update')  @section('content')
<div class="container">
  <div class="row">
    <div class="container bpu-container">
      <h1> Supervisor Update</h1>  <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ config('custom.app.root') }}/updatesupervisor">  {{ csrf_field() }}
            <div class="form-group">
              <label for="supervisorid">Supervisor ID</label>  <input type="text" class="form-control" id="supervisorid" placeholder="Enter supervisor ID" name="supervisorid" value="{{ $singleuserdata->id }}" readonly>
            </div>
            <div class="form-group">
              <label for="supervisorname">Supervisor Name</label>  <input type="text" class="form-control" id="supervisorname" placeholder="Enter supervisor name" name="supervisorname" value="{{ $singleuserdata->name }}" required>
            </div>
            <div class="form-group">
              <label for="supervisornames">සුපරීක්ෂක නම</label>  <input type="text" class="form-control" id="supervisornames" placeholder="Enter supervisor names (Sinhala)" name="supervisornames" value="{{ $singleuserdata->names }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
