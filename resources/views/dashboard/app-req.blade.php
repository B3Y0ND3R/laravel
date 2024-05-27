@extends('dashboard.x')


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="x-icon" href="images/logo.png">
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
        <body>

            @section('p')
<div class="home-container" style="width:70vw">
    <form method="POST" action="{{ route('role_request.store') }}">
        @csrf
        <div class="mb-6">
            <label for="requested_role" class="inline-block text-lg mb-2">Role</label>
            <input type="hidden" name="current_role" value="{{ Auth::user()->role }}">
            <select name="requested_role" class="border border-gray-200 rounded p-2 w-full">
                <option value="">Select Role</option>
                <option value="employer">Employer</option>
                <option value="applicant">Applicant</option>
            </select>
            @error('role')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black" onclick="return confirm('Are you sure you want to update this user role?');">
            Submit
        </button>
    </form>
    
    
</div>

@endsection


@section('nav')
<div class="item">
    <i class='bx bx-list-check'></i>
    <a href="/dashboard/employer/manage">Manage Jobs</a>
</div>
<div class="item">
    <i class='bx bx-file'></i>
    <a href="/listings/create">Post a Job</a>
</div>
<div class="item">
    <i class='bx bx-file'></i>
    <a href="/applicant/role-request">Role Request</a>
</div>
    @endsection

        </body>
        </html>