@extends('layout')

@section('content')
@include('partials._search')

<a href="i/" class="inline-block text-black ml-4 mb-4">
    <i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
    <x-card class="p-10">
        <div class="flex flex-col items-center justify-center text-center">
            <img class="w-48 mr-6 mb-6"
                 src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
                 alt=""/>

            <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>

            <x-listing-tags :tagsCsv="$listing->tags"/>

            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">Job Description</h3>
                <div class="text-lg space-y-6">
                    {{$listing->description}}

                    <div class="flex flex-col items-center space-y-4 mt-6">
                        <a href="mailto:{{$listing->email}}"
                           class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                           style="width:12vw;">
                            <i class="fa-solid fa-envelope"></i> Contact Employer
                        </a>

                        @if (Auth::check())
                            @if(session('user.role')=='applicant')
                                @if ($hasApplied)
                                    <span class="block bg-laravel text-white py-2 rounded-xl opacity-50 cursor-not-allowed"
                                          style="width: 12vw;">
                                        <i class="fa-solid fa-finger-point-up"></i> Already Applied
                                    </span>
                                @else
                                    <a href="/listings/{{$listing->id}}/apply" target="_blank"
                                       class="block bg-laravel text-white py-2 rounded-xl hover:opacity-80"
                                       style="width: 12vw;">
                                        <i class="fa-solid fa-finger-point-up"></i> Apply
                                    </a>
                                @endif
                            @else
                                <span class="block bg-laravel text-white py-2 rounded-xl opacity-50 cursor-not-allowed"
                                      style="width: 12vw;">
                                    <i class="fa-solid fa-finger-point-up"></i> You cannot apply
                                </span>
                            @endif
                        @else
                            <a href="/login" target="_blank"
                               class="block bg-laravel text-white py-2 rounded-xl hover:opacity-80 disabled"
                               style="width: 12vw;">
                                <i class="fa-solid fa-finger-point-up"></i> Login to Apply
                            </a>
                        @endif

                        @php
                            $websiteLink = $listing->website;
                            if (!Str::startsWith($websiteLink, ['http://', 'https://'])){
                                $websiteLink = 'http://' . $websiteLink;
                            }
                        @endphp

                        <a href="{{ $websiteLink }}" target="_blank"
                           class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                           style="width: 12vw;">
                            <i class="fa-solid fa-globe"></i> Visit Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
</div>
@endsection
