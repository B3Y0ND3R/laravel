@extends('dashboard.x')



@section('p')
<div class="home-container" style="width: 70vw;">
    <table class="w-full table-auto rounded-sm">
        <tbody>


            @php
    $applicationsCount = count($applications);
    $listingsCount = count($listings);
    $maxCount = max($applicationsCount, $listingsCount);
@endphp



            @unless ($applications->isEmpty())
    @foreach ($applications as $application)
        @if($application->user_id == auth()->user()->id)
            @php
                $listing = $application->listing; 
            @endphp
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/listings/{{$listing->id}}">
                       Post: {{$listing->title}}
                    </a>
                </td>

                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/listings/{{$listing->id}}">
                       Location: {{$listing->location}}
                    </a>
                </td>

                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <a href="/listings/{{$listing->id}}">
                        <img class="mr-6 mb-6" src="{{$listing->logo ? asset('storage/' . $application->listing->logo) : asset('/images/no-image.png')}}"
                        alt="" width="100" height="100">
                    </a>
                </td>
            </tr>
        @endif
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
    <i class='bx bx-list-check'></i>
    <a href="/dashboard/applicant/applied">Jobs applied</a>
</div>
<div class="item">
    <i class='bx bx-file'></i>
    <a href="/dashboard/applicant/upload-cv">Your CV</a>
</div> 
@endsection

        </body>
        </html>



