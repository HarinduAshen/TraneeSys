<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >

   

<link rel="stylesheet" type="text/css" href="{{ asset('css/default_style.css') }}" >
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom-primarybtn.css') }}" >
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom-navstyle.css') }}" >
<link rel="stylesheet" type="text/css" href="{{ asset('css/imagestyle.css') }}" >


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>



    <title>@yield('title') Page</title>
</head>
<body class="bg">

  <!-- Navigation Content -->

  @if(Auth::check() && Auth::user()->role == 'admin')
                <<div class="container-fluid">
                    @include('layouts.nav')   
                    </div>
                </div>
               
                
                @elseif(Auth::check() && Auth::user()->role == 'user')
                <div class="container-fluid">
                    @include('user.nav')   
                    </div>
                
                @endif

  
           <!-- Navigation Content End -->


        <div class="container" id='content'>    
                @section('content')@show             
        </div>


        <!-- Footer Content -->
          
            @include('layouts.footer')       
        
         <!-- Footer Content End -->

<!-- Vite JavaScript -->


    
</body>
</html>