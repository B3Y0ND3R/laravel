@extends('dashboard.x')

@section('p')
{{-- <h2>Applications for Listing ID: {{ $listing->id }}</h2> --}}




    <table class="w-full table-auto rounded-sm">
        <tbody>

            @foreach($listing->applications as $application)
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
        </tbody>
    </table>

{{-- @foreach($listing->applications as $application)
    <div>
        <h3>Application ID: {{ $application->id }}</h3>
        <p>Applied by: {{ $application->user->name }}</p>
    </div>
@endforeach --}}
@endsection


@section('nav')
<div class="item">
    <i class='bx bx-user'></i>
    <a href="/dashboard/employer/manage">Manage Jobs</a>
</div>
<div class="item">
    <i class='bx bx-user'></i>
    <a href="/listings/create">Post a Job</a>
</div>
    @endsection
