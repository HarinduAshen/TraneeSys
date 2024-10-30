<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title','Division update')
@section('content')
    <H1>Update the Divisions </H1>
    <br><br><br>
    <form action="{{route('division.update', $division->division_id)}}" method="post">
        @csrf
        <div class="form-group form-row">
        <label class="col-sm-2" ><b>Update Division Name</b></label>
        <div class="col-sm-9">
        <input type="text" name="division_name" value="{{$division->division_name}}" class="form-control" placeholder="Enter Division Name: ""><br>
        </div>
        </div>
        <input type="submit" class="btn btn-success" value="SAVE">
        <input type="button" class="btn btn-danger" value="CLEAR">

    </form>

    @endsection
