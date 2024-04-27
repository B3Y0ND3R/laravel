@extends('dashboard.x')



@section('p')
    <table class="w-full table-auto rounded-sm">
        <tbody>


            @php
    $applicationsCount = count($applications);
    $listingsCount = count($listings);
    $maxCount = max($applicationsCount, $listingsCount);
@endphp

{{-- @for ($i = 0; $i < $maxCount; $i++)
    @if ($i < $applicationsCount)
        {{-- Display application 
        {{ $applications[$i]->id }}
    @endif

    @if ($i < $listingsCount)
        {{-- Display listing 
        {{ $listings[$i]->id }}
    @endif
@endfor --}}


            {{-- @unless ($applications->isEmpty())
            @foreach ($applications as $application)
            @foreach ($listings as $listing)
            @if($application->user_id == auth()->user()->id && $application->listing_id == $listing->id)
            <tr class="border-gray-300">
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a href="/listings/{{$listing->id}}">
                        {{$listing->title}}
                    </a>
                </td>
                
            </tr>
            @endif
            @endforeach
            @endforeach  
            @endunless --}}


            @unless ($applications->isEmpty())
    @foreach ($applications as $application)
        @if($application->user_id == auth()->user()->id)
            @php
                $listing = $application->listing; 
            @endphp
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/listings/{{$listing->id}}">
                        {{$listing->title}}
                    </a>
                </td>
            </tr>
        @endif
    @endforeach
@endunless

        </tbody>
    </table>

   

@endsection

@section('nav')
<div class="item">
    <i class='bx bx-user'></i>
    <a href="/dashboard/applicant/applied">Jobs Applied</a>
</div>
<div class="item">
    <i class='bx bx-user'></i>
    <a href="/dashboard/applicant/request">Request Role Change</a>
</div> 
@endsection

        </body>
        </html>



