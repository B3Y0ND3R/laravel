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

            @php
$u_id=session('user.id')
@endphp
@php
$u_name=session('user.name')
@endphp
@php
$u_email=session('user.email')
@endphp
@php
$u_role=session('user.role')
@endphp
@php
$u_pic=session('user.pic')
@endphp
@php
$u_cv=session('user.cv')
@endphp

            @section('p')
<div class="home-container" style="width: 70vw;">
    @auth
    <table class="w-full table-auto rounded-sm">
        <tbody>
            @foreach($users as $user)
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/users/{{ $user->id }}">
                        User ID: {{ $user->id ?? 'N/A' }}
                    </a>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/users/{{ $user->id }}">
                        Username: {{ $user->name ?? 'N/A' }}
                    </a>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/users/{{ $user->id }}">
                        <img class="mr-6 mb-6" src="{{ $user->pic ? asset('storage/' . $user->pic) : asset('/images/no-image.png') }}" alt="User Image" width="100" height="100">
                    </a>
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    @if($u_role == 'employer')
                    <a href="/dashboard/admin/users/{{$user->id}}/listings" class="text-blue-400 px-6 py-2 rounded-xl">
                        <i class="fa-solid fa-file"></i> Jobs
                    </a>
                    @elseif($u_role == 'applicant')
                    <a href="/dashboard/admin/users/{{$user->id}}/applications" class="text-blue-400 px-6 py-2 rounded-xl">
                        <i class="fa-solid fa-file"></i> Applications
                    </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endauth
</div>
@endsection


@section('nav')
<div class="item">
    <i class='bx bx-user'></i>
    <a href="/dashboard/admin/users">Users</a>
</div>
<div class="item">
    <i class='bx bx-user'></i>
    <a href="/dashboard/admin/roles">Manage Roles</a>
</div>
    @endsection

        </body>
        </html>