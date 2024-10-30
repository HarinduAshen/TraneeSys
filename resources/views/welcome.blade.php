<!DOCTYPE html>
@extends('layouts.mainlayout')
@section('title','Trainee list')
@section('content')
<html>
<style>
    .btn-custom {
        display: inline-block;
        padding: 10px 70px;
        color: white;
        background-color: #003366; /* Dark blue */
        border-radius: 15px;
        border: 2px solid #003366; /* Dark blue */
        box-shadow: 0 4px 8px rgba(0, 51, 102, 0.2);
        text-decoration: none;
        transition: background-color 0.3s, border-color 0.3s;
        margin-left: 10px; /* Space between buttons */
    }

    .btn-custom:hover {
        background-color: rgb(51, 197, 255);
        border-color: rgb(41, 255, 255);
        color: white;
    }

    .header-container {
        display: flex;
        align-items: center; /* Vertically align items */
        justify-content: space-between; /* Space between image and buttons */
        margin-top: 20px; /* Adjust margin as needed */
    }

    .button-container {
        display: flex;
        align-items: center; /* Center buttons vertically */
    }

    .image-container img {
        border-radius: 30px;
    }
</style>
<body>
    <div style="margin-top: 10px;">
        <div class="header-container">
            <!-- Image on the left -->
            <div class="image-container">
                <a class="navbar-brand" href="{{ config('custom.app.root') }}/">
                    <img src="{{ asset('images/bpulogo.png') }}" width="500px" height="auto" class="d-inline-block align-center" id="nav-image-logo" alt="">
                </a>
            </div>

            <!-- Buttons on the right -->
            <div class="button-container">
                @if (Route::has('login'))
                    @auth
                        {{-- <a href="{{ url('/dashboard') }}" class="btn btn-custom">
                            Dashboard
                        </a> --}}
                    @else
                        <a href="{{ route('login') }}" class="btn btn-custom">
                            LOGIN
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-custom">
                                REGISTRATION
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>

        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-8" id="container01">
                    <p style="font-family: 'Arial', sans-serif; color: #ffffff; font-weight: bold; font-size: 24px; text-transform: margin-bottom: 10px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);">
                        <?php
                        $hour = date('h');
                        $ampm = date('a');
                        if ($ampm == 'am') {
                            echo "🌅 Hello, Good morning!";
                        } elseif ($ampm == 'pm' && $hour < 6) {
                            echo "☀️ Hello, good afternoon!";
                        } else {
                            echo "🌙 Hello, good evening!";
                        }
                        ?>
                    </p>
                    <h2 style="color: #f4fbff; /* White text color */
                    text-align: center;
                    font-family: 'Roboto', sans-serif; /* Setting the font family for the entire document */
                    font-size: 40px;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8); /* Text shadow for effect */
                    padding-left: 50px; /* Adding left padding */">
                        Trainee Management System
                    </h2>
                    <h2 style="color: #d1e8f4; font-family: 'Times New Roman', Times, serif; font-weight: bold; text-align: center; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);"></h2>

                    <div class="row justify-content-center" id="container03">
                       

                        <div class="col-md-6">
                            <div class="card" style="width: 18rem;border-radius: 40px;">
                                <div class="card-body">
                                    <div style="background-color: #ADD8E6; border-radius: 40px;padding: 20px; text-align: center;">
                                        <p style="font-family: 'Arial', sans-serif; color: #333; font-weight: bold; margin-bottom: 10px;">Arthur C. Clarke Institute for Modern Technologies</p>
                                        <a href="https://www.accimt.ac.lk/?page_id=779" class="btn btn-outline-dark" style="border-radius: 40px;">Click for more information About ACC</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" id="container02">
                    <br/><br/>
                    <img class="card-img-top" src="images/hrmodulehomeimage.jpg" alt="Card image" style="border-radius: 30px;">
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
