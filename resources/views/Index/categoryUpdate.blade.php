<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title','Edit Category Count')
@section('content')
<div class="container" id="content">    
    <div class="container">
    <div class="row">
    <div class="container bpu-container">
    <h1>Edit Category📚</h1>
    <form action="{{ route('category.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group form-row">
        <label class="col-sm-2">Select Division :</label>
        <div class="col-sm-9">
        <select name="division_id" id="division" class="form-control">
            @foreach($divisions as $division)
                <option value="{{ $division->division_id }}" {{ $division->division_id == $category->division_id ? 'selected' : '' }}>
                    {{ $division->division_name }}
                </option>
            @endforeach
        </select><br>
        </div>

        <label class="col-sm-2">Student Type: </label>
        <div class="col-sm-9">
        <label>Special</label>
        <input type="radio" name="type" value="Special" {{ $category->type == 'Special' ? 'checked' : '' }}>
        <label>General</label>
        <input type="radio" name="type" value="General" {{ $category->type == 'General' ? 'checked' : '' }}>
        </div><br><br>
        <label class="col-sm-2">No.of Students </label>
        <div class="col-sm-9">
        <input type="text" name="count" value="{{ $category->count }}" placeholder="Enter Student Count" class="form-control">
        </div>
        </div>
        <input type="submit" value="Update" class="btn btn-success">
        <button class="btn btn-danger" ><a href="{{ url('category.create') }}" style="color: white;">Cancel</a></button>
    </form>
    </div>
    </div>
    </div>
</div>

    @endsection
