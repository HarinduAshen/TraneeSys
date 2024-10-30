<nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="navbar">
  <a class="navbar-brand" href="{{config('custom.app.root')}}/">
    <img src="{{ asset('images/bpulogo.png') }}" width="360px" height="100%" class="d-inline-block align-center" id="nav-image-logo" alt="">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <h2 style="color: #fff; text-align: center; font-family: 'Arial', sans-serif; font-size: 25px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); padding-left: 50px;">
    Trainee Management System👩‍💻👨‍💻
  </h2>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{config('custom.app.root')}}/dashboard">HOME <span class="sr-only">(current)</span></a>
      </li>
      
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          TRAINEE DETAILS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item {{request()->is('') ? 'active' : ''}}" href="{{ url('/traineelist') }}">TRAINEE LIST</a>
          <a class="dropdown-item {{request()->is('') ? 'active' : ''}}" href="{{ url('/findtrainee') }}">FIND TRAINEE</a>
          <a class="dropdown-item {{request()->is('') ? 'active' : ''}}" href="{{ url('/trainee-summary') }}">TRAINEE SUMMARY</a>
          {{-- <a class="dropdown-item {{request()->is('') ? 'active' : ''}}" href="{{ url('/traineetask') }}">TRAINEE TASK</a> --}}
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" >TRAINEE LETTER </a>
      </li>
      
      <!-- User Profile and Logout -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          USER
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault(); this.closest('form').submit();">
              {{ __('Log Out') }}
            </a>
          </form>
        </div>
      </li>
    </ul>
  </div>
</nav>
