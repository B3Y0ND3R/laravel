@extends('layout')

@section('content')


<x-card class="p-10">
    <header>
        <h1
            class="text-3xl text-center font-bold my-6 uppercase"
        >
            Total Users
        </h1>
    </header>

    <div class="home-container">
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-card>
@endsection