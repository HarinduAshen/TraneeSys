<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title','Uniorinstitute')
@section('content')
<?php

if (!(session()->has('logdata'))) {
?>
  <!--<script>window.location = "{{config('custom.app.root')}}/logoutfun";</script>-->
<?php
}

?>
<div class="container">
  <div class="row">
    <div class="container bpu-container">
      <h1> University or Institute Details</h1>
      <div class="row">
        <div class="col-md-12 text-left">
          <form action="{{config('custom.app.root')}}/saveuniorinstitute" method="POST">
            {{csrf_field()}}
            <div class="form-group">

            <input type="text" class="form-control" name="uniorinstitutename" placeholder="Enter the University or Institute Name Here"></div>
            <input type="text" class="form-control" name="uniorinstitutenames" placeholder="විශ්වවිද්‍යාලයේ / ආයතනයේ නම මෙහි ඇතුලත් කරන්න">
            
            </br>
            <input type="submit" class="btn btn-primary" value="SAVE">
            <input type="button" class="btn btn-warning" value="CLEAR">
            </br> </br>
          </form>
          <table class="table table-dark" style="width:100%;">
            <th>ID</th>
            <th>UNIVERSITY / INSTITUTE NAME</th>
            <th>විශ්වවිද්‍යාලයේ / ආයතනයේ නම</th>
            <th>IS ACTIVE</th>
            @foreach($uniorinstitutes as $uniorinstitute)
            <tr>
              <td> {{$uniorinstitute->id}} </td>
              <td> {{$uniorinstitute->name}} </td>
              <td>  {{$uniorinstitute->names}} </td>
              <td> {{$uniorinstitute->IsActive == 1? 'Active' : 'Inactive'}} </td>
              <td>
                {{csrf_field()}}
                <a href="{{config('custom.app.root')}}/deleteuniorinstitute/{{$uniorinstitute->id}}" class="btn btn-danger">Delete</a>
                <a href="{{config('custom.app.root')}}/updateuniorinstitute/{{$uniorinstitute->id}}" class="btn btn-warning">Update</a>
              </td>
            </tr>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
