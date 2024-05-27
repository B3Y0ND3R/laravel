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
<div class="home-container">

    <table class="w-full table-auto rounded-sm" style="width: 70vw;">
        <tbody>

            @unless ($applications->isEmpty())
            @foreach ($applications as $application)
            <tr class="border-gray-300">
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    {{-- <a href="/listings/{{$listing->id}}"> --}}
                    <a href="/users/{{$application->user->id}}">
                        Application ID: {{ $application->id }}
                    </a>
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    {{-- <a
                        href="/listings/{{$listing->id}}/edit"
                        class="text-blue-400 px-6 py-2 rounded-xl"
                    > --}}
                    <a href="/users/{{$application->user->id}}">
                        Applied by: {{ $application->user->name }}
                        </a>
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                {{-- <img src="{{ asset($application->user->pic) }}" alt=""> --}}
                <a href="/users/{{$application->user->id}}">
                <img
                            class="w-48 mr-6 mb-6"
                            src="{{$application->user->pic ? asset('storage/' . $application->user->pic) : asset('/images/no-image.png')}}"
                            alt=""
                            height="200px"
                            width="200px"
                        />
                </a>

                </td>

                
            </tr>
            @endforeach  
            @else
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <p class="text-center">
                        No Listings Found
                    </p>
                </td>
            </tr>
            @endunless
        </tbody>
    </table>
</div>

@endsection


@section('nav')
<div class="item">
    <i class='bx bx-user'></i>
    <a href="/dashboard/admin/users">Users</a>
</div>
<div class="item">
    <i class='bx bx-file'></i>
    <a href="/dashobard/admin/role-requests">Role Requests</a>
</div>
<div class="item">
    <i class='bx bx-user'></i>
    <a href="/">Manage Roles</a>
</div>
    @endsection

        </body>
        </html>