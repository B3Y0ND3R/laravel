@extends('dashboard.x')


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
    <style>
        .flex-container {
            display: flex;
        }
        .nav {
            width: 250px;
            padding: 20px;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>

    <div class="flex-container">
        <div class="nav">
            @section('nav')
            @if(auth()->user()->role == 'admin')
            <div class="item">
                <i class='bx bx-group'></i>
                <a href="/dashboard/admin/users">Users</a>
            </div>
            <div class="item">
                <i class='bx bx-file'></i>
                <a href="/dashboard/admin/roles">Manage Roles</a>
            </div>
            @elseif(auth()->user()->role == 'employer')
            <div class="item">
                <i class='bx bx-list-check'></i>
                <a href="/dashboard/employer/manage">Manage Jobs</a>
            </div>
            <div class="item">
                <i class='bx bx-file'></i>
                <a href="/listings/create">Post a Job</a>
            </div>
            @elseif(auth()->user()->role == 'applicant')
            <div class="item">
                <i class='bx bx-list-check'></i>
                <a href="/dashboard/applicant/applied">Jobs applied</a>
            </div>
            <div class="item">
                <i class='bx bx-file'></i>
                <a href="/dashboard/applicant/upload-cv">Your CV</a>
            </div>
            @endif
            @endsection
        </div>

        <div class="content">
            @section('p')
            <x-card class="p-10 mx-auto mt-24" style="width: 70vw;">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Edit Profile
                    </h2>
                </header>

                <form action="/updated-profile" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="inline-block text-lg mb-2">
                            Name
                        </label>
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="name"
                            value="{{auth()->user()->name}}"
                        />
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">
                            Email
                        </label>
                        <input
                            type="email"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="email"
                            value="{{auth()->user()->email}}"
                        />
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>


                    <div class="mb-6">
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{Auth::user()->pic ? asset('storage/' . Auth::user()->pic) : asset('/images/no-image.png')}}"
                            alt=""
                        />
                        <label for="pic" class="inline-block text-lg mb-2">
                            Profile Picture
                        </label>
                        <input
                            type="file"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="pic"
                        />
                        @error('pic')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        @if(!auth()->user()->cv)
                        <p class="bg-white text-laravel rounded py-2 px-4">
                            You do not have any CV uploaded<br>
                            Please upload your CV here:<br>
                            </p>
                        @else
        <div class="text-lg space-y-6">

            <a href="{{ asset('storage/' . auth()->user()->cv) }}" target="_blank" class="bg-laravel text-white mt-6 py-2 rounded-xl flex items-center justify-center hover:opacity-80" style="width: 100px;"><i class="fa-solid fa-file"></i>
                View CV
            </a>
        </div>
        @endif

                        <label for="cv" class="block">
                            Upload CV
                        </label>
                    <input type="file" name="cv"/>
                    @error('cv')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="mb-6">
                        <button
                            type="submit"
                            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                        >
                            Update Profile
                        </button>
                    </div>

                </form>
            </x-card>
            @endsection
        </div>
    </div>


