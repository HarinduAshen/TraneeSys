<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title','Type')
@section('content')
<div class="container" id="content">    
    <div class="container">
    <div class="row">
    <div class="container bpu-container">
    <h1>Trainee Students Category📚</h1>
    <form action="{{route('category.store')}}" method="post">
        @csrf
        <div class="form-group form-row">
        <label class="col-sm-2">Select Division :</label>
        <div class="col-sm-9">
        <select name="division_id" id="division" class="form-control">

            @foreach($divisions as $division)
                    <option value="{{ $division->division_id }}" name="division_id">{{ $division->division_name }}</option>
            @endforeach
        </select><br><br>
        </div>
        <label class="col-sm-2">Student Type: </label>
        <div class="col-sm-9">
        <label>Special</label>
        <input type="radio" name="type" value="Special" id="spe" >

        <label>General</label>
        <input type="radio" name="type" value="General" id="gen">
    </div><br><br>

        <label class="col-sm-2">No.of Students </label>
        <div class="col-sm-9">
        <input type="text" name="count" placeholder="Enter Student Count" class="form-control">
        </div>
        </div>
        <input type="submit" class="btn btn-success" value="SAVE">
        <input type="reset" class="btn btn-danger" value="CLEAR">
        
    </form>

    <br><br>
    <div class="">
        <table class="table table-dark">
            <tr>
                <th>ID</th>
                <th>Division ID</th>
                <th>Division Name</th>
                <th>Type </th>
                <th>No Of Student</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @foreach ($categories as $categorie)
            <tr>
                <td>{{$categorie->id}}</td>
                <td>{{$categorie->division_id}}</td>
                <td>
                    @foreach($divisions as $division)
                            @if($division->division_id == $categorie->division_id)
                                {{ $division->division_name }}
                            @endif
                        @endforeach
                </td>
                     {{-- <td>{{ optional($categorie->division)->Division_name }}</td> --}}
                <td>{{$categorie->type}}</td>
                <td>{{$categorie->count}}</td>

                <td>
                    {{-- <form action="{{route('category.editpage', $categorie->id)}}" method="POST">
                        @csrf

                        <button type="submit">Update</button>
                    </form> --}}
                    <a href="{{ route('category.editpage', $categorie->id) }}" class="btn btn-warning">Update</a>

                </td>
                <td>
                    <form action="{{ route('category.destroy', $categorie->id) }}" method="POST">
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
