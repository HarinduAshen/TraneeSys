@extends('layouts.mainlayout')
@section('title','Update Degreeorcourse')
@section('content')

<div class="container bpu-container">
  <h1 class="pt-5"> Update Degree / course</h1>
  <div class="row">
    <div class="col-md-12 text-left">
      <form method="post" action="{{config('custom.app.root')}}/updatedegdata">
        {{csrf_field()}}
        <div class="form-group">
          <label for="degreeid">Degree or course ID</label>
          <input type="text" class="form-control" id="degreeid" placeholder="Enter Uniorinstitute Name" name="degreeid" value="{{$singleuserdata->id}}" Readonly>
        </div>
        <div class="form-group">
          <label for="degreeid">University or Institute Name</label>
          <select class="form-control formselect required" placeholder="Select Uniorinstitute" id="uniorinstituteSelect" name="uniorinstituteSelect">

            @foreach($task as $tasks)
            <option value="{{$tasks->id}}" {{$singleuserdata->fid == $tasks->id? 'selected' : ''}}>
              {{ ucfirst($tasks->name) }}
            </option>
            @endforeach

          </select>
        </div>
        <div class="form-group">
          <label for="degreename">Degree or course Name</label>
          <input type="text" class="form-control" id="degreename" placeholder="Enter username" name="degreename" value="{{$singleuserdata->dname}}" required>
        </div>
        <div class="form-group">
                            <label for="exampleFormControlInput1">උපාධිය / පාඨමාලාවේ නම ඇතුළත් කරන්න</label>
                            <input type="text" class="form-control" id="depnames" name="depnames" placeholder="උපාධිය / පාඨමාලාවේ නම  " value="{{$singleuserdata->dnames}}" required>
                        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>

@endsection
