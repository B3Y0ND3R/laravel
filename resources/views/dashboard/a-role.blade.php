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
    <table class="w-full table-auto rounded-sm">
        <tbody>
            @unless ($roleRequests->isEmpty())
            @foreach($roleRequests as $request)
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    User: {{ $request->user->name }}
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    Current: {{ $request->current_role }}
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    Requested: {{ $request->requested_role }}
                </td>
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <form action="{{ route('admin.role_requests.update', $request->id) }}" method="POST">
                        @csrf
                        @method('PUT') 
                        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black" onclick="return confirm('Are you sure you want to update this user role?');">Approve</button>
                    </form>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <form action="{{ route('admin.role_requests.delete', $request->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white rounded py-2 px-4 hover:bg-red-700" onclick="return confirm('Are you sure you want to delete this role request?');">Delete</button>
                        </form>
                    </td>
                    
            </tr>
            @endforeach
            @else
            <p class="text-center">
            All requests processed
            </p>
            @endif
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
    <a href="/dashboard/admin/roles">Manage Roles</a>
</div>
    @endsection

        </body>
        </html>