<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="x-icon" href="images/j.png">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>JobHelp | Find Jobs & Projects</title>
    </head>

    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/"
                ><img class="w-24" src="{{asset('images/j.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @php
                    $u_name = session('user.name');
                    $u_role = session('user.role');
                @endphp

      <li>
        @if($u_role == 'admin' || $u_role == 'employer' || $u_role == 'applicant')
        <span class="font-bold uppercase">
          Welcome {{$u_name}}
        </span>
      </li>
      {{-- <li>
        <a href="/listings/handle" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Listings</a>
      </li>
      <li>
        <a href="/users/{{auth()->user()->id}}" class="hover:text-laravel"><i class="fa-solid fa-user"></i> My Profile</a>
      </li> --}}


      <li>
        <a href="{{ route($u_role . '.dashboard') }}" class="hover:text-laravel"><i class="fa-solid fa-window-restore"></i> Dashboard</a>
    </li>



      <li>
        <form class="inline" method="POST" action="/logout">
          @csrf
          <button type="submit">
            <i class="fa-solid fa-door-closed"></i> Logout
          </button>
        </form>
      </li>

      @else
      <li>
        <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
      </li>
      <li>
        <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
      </li>
      @endif
    </ul>
  </nav>
        <main>
    @yield('content')
        </main>
        <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
    style="height:50px;">
        <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p>

    </footer>
    <x-flash-messeges />
</body>
</html>