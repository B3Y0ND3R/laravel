@extends('layout')

@section('content')


<x-card class="p-10">
    <header>
        <h1
            class="text-3xl text-center font-bold my-6 uppercase"
        >
            Total Companies
        </h1>
    </header>

    <div class="home-container">
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @foreach($listings as $listing)
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/listings/{{ $listing->id }}">
                            Company ID: {{ $listing->id ?? 'N/A' }}
                        </a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/listings/{{ $listing->id }}">
                            Company: {{ $listing->company ?? 'N/A' }}
                        </a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/listings/{{ $listing->id }}">
                            <img class="mr-6 mb-6" src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="User Image" width="100" height="100">
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-card>
@endsection