<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title','Trainee Task')
@section('content')
<div class="container">
    <div class="row">
        <div class="container bpu-container">
            <h1> Trainee Task 👩‍🏫</h1>
            <div class="row">
                <div class="col-md-12 text-left">
                    <form method="post" action="{{ url('/trainees') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="tasks">Tasks</label>
                            <!-- Quill editor container with border -->
                            <div id="editor" style="height: 200px; border: 1px solid #ccc;"></div>
                            <input type="hidden" id="tasks" name="tasks">
                        </div>

                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Quill library -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<style>
    .circular-image {
        width: 100px; /* Adjust the size as needed */
        height: 100px; /* Adjust the size as needed */
        border-radius: 50%;
        object-fit: cover; /* Ensures the image covers the container without distortion */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],        // toggled buttons
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'header': [1, 2, 3, false] }],
                    ['link', 'image']
                ]
            }
        });

        var form = document.querySelector('form');
        form.onsubmit = function() {
            var tasks = document.querySelector('input[name=tasks]');
            tasks.value = quill.root.innerHTML;
        };

        // Clear button functionality
        var clearButton = document.querySelector('input[type=button][value=CLEAR]');
        clearButton.onclick = function() {
            quill.root.innerHTML = '';
        };
    });
</script>
@endsection
