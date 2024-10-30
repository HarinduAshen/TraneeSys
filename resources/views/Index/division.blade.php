<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title','Division')
@section('content')
    <div class="container" id=" ">    
    <div class="container">
    <div class="row">
    <div class="container bpu-container">
    <h1> Division Details📋</h1>
    <br>
   
    <form action="{{route('division.adddivision')}}" method="post">
        @csrf
        <h4>Add New Devision</h4><br>
        <div class="form-group form-row">
        
        <label for="exampleInputEmail1" class="col-sm-2">Division Name</label>
        <div class="col-sm-9">
        <input type="text" name="division_name" class="form-control" placeholder="Enter Division Name: ">
        </div>
        </div>
        
        <input type="submit" class="btn btn-success" value="SAVE">
        <input type="reset" class="btn btn-danger" value="CLEAR">
    </form><br><br>
    <div class="section-header">
    <h4>Trainee Category Details</h4>
    <a href="{{route('category.create')}}" class="btn btn-secondary " style="color: white;">Add Category Details</a><br><br>
    </div>

    <br>

    <h2 align="center">Divisions in ACCIMT</h2>
    <br>
    <div class="">
        <table class="table table-dark">
            <tr>
               
                <th>Division Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @foreach ($divisiones as $division)
            <tr>
               
                <td>{{$division->division_name}}</td>

                <td>
                     <form action="{{ route('division.editpage', $division->division_id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Update</button>
                    </form>

                </td>
                <td>
                    <form action="{{ route('division.destroy', $division->division_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>


            </tr>

             @endforeach

        </table>
    </div>
</div>
</div>
</div>
</div>
@endsection
