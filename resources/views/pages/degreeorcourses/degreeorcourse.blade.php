<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title','Degreeorcourse')
@section('content')
<div class="container">
    <div class="row">
        <div class="container bpu-container">
            <h1> Degree / Course Details 📚</h1>
            <div class="row">
                <div class="col-md-12 text-left">
                    <form method="post" action="{{ url('/savedeg') }}" enctype="multipart/form-data">
                        @csrf
                        
    


                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">University or Institute Name</label>
                          <select class="form-control formselect required" placeholder="Select Uniorinstitute" id="uniorinstituteSelect" name="uniorinstituteSelect">
                                <option value="0" disabled selected>Select University or Institute*</option>
                                @foreach($task as $tasks)
                                <option value="{{$tasks->id}}">
                                    {{ ucfirst($tasks->name) }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Degree / Course Name</label>
                            <input type="text" class="form-control" id="depname" name="depname" placeholder="Enter Degree or course name">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">උපාධිය / පාඨමාලාවේ නම </label>
                            <input type="text" class="form-control" id="depnames" name="depnames" placeholder="උපාධිය / පාඨමාලාවේ නම ඇතුළත් කරන්න ">
                        </div>
                        </br>
                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                        </br> </br>
                    </form>
                    <table class="table table-dark">
                        <th>ID</th>
                        <th>University or Institute Name</th>
                        <th>Degree / Course Name</th>
                        <th>උපාධිය / පාඨමාලාවේ නම</th>

                        <th>IsActive</th>
                        @foreach($deptdata as $deptdata)
                        <tr>
                            <td> {{$deptdata->order_id}} </td>
                            <td> {{$deptdata->name}} </td>
                            <td> {{$deptdata->dname}} </td>
                            <td> {{$deptdata->dnames}} </td>
                            <td> {{$deptdata->IsActive == 1 ? 'Active' : 'Inactive'}} </td>
                            <td>
                                <a href="{{config('custom.app.root')}}/deletedeg/{{$deptdata->id}}" class="btn btn-danger">Delete</a>
                                <a href="{{config('custom.app.root')}}/updatedeg/{{$deptdata->id}}" class="btn btn-warning">Update</a>
                            </td>
                        </tr>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
