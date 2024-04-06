@extends('dashboard.mould')

@section('print')
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Panel</title>
  {{-- <link rel="shortcut icon" type="x-icon" href="a.png"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('dashboard/style.css') }}"> --}}

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>


<body>


  <div class="container">
    <nav>
      <ul>
        <li><a href="/users/{{auth()->user()->id}}" class="logo">
          <img
                            class="w-48 mr-6 mb-6"
                            src="{{auth()->user()->pic ? asset('storage/' . auth()->user()->pic) : asset('/images/no-image.png')}}"
                            alt=""
                        />
          <span class="nav-item">{{auth()->user()->name}}</span>
        </a></li>
        <li><a href="/">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a></li>
         <li><a href="/users/{{auth()->user()->id}}">
          <i class="fas fa-user"></i>
          <span class="nav-item">My Profile</span>
        </a></li>
       {{-- <li><a href="on.php?timelinesetting=true">
        <i class="fas fa-calendar"></i>
          <span class="nav-item">Timeline</span>
        </a></li>
        <li><a href="on.php?skillsetting=true">
        <i class="fas fa-tasks"></i>
          <span class="nav-item">Skills</span>
        </a></li>

        <li><a href="on.php?projectsetting=true">
        <i class="fas fa-file-invoice"></i>
          <span class="nav-item">Projects</span>
        </a></li>
        <li><a href="on.php?hobbysetting=true">
        <i class="fas fa-icons"></i>
          <span class="nav-item">Hobbies</span>
        </a></li> --}}
        <li><a class="logout" href="/logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="log-out">Log out</span>
        </a></li>

        @yield('nav')
      </ul>
    </nav>


    

    <section class="main">
    <div class="main-top">

    </div>


  

<div class="home-container">
@yield('a')
</div>



     
      
    
    

</section>
<main>
  
</main>


    
  </div>
</body>
</html>

@endsection

