@extends('layout')

@section('content')
@include('partials._search')


<a href="i/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <x-card class="p-10">
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                        <div class="text-xl font-bold mb-4">{{$listing->company}}</div>


                        <x-listing-tags :tagsCsv="$listing->tags" />

                            
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6">
                                {{$listing->description}}

                                <a
                                    href="mailto:{{$listing->email}}"
                                    class="block bg-black text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >

                                {{-- <form action="/listings/{{$listing->id}}/apply" method="POST">
                                    @csrf
                                    <button type="submit" class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                                        <i class="fa-solid fa-hand-point-up"></i> Apply
                                    </button>
                                </form> --}}

                                @if (Auth::check())
                                <a
                                href="/listings/{{$listing->id}}/apply"
                                target="_blank"
                                class="block bg-laravel text-white py-2 rounded-xl hover:opacity-80"
                                ><i class="fa-solid fa-finger-point-up"></i>Apply</a
                                >
                                @else
                                <a
                                href="/login"
                                target="_blank"
                                class="block bg-laravel text-white py-2 rounded-xl hover:opacity-80 disabled"
                                ><i class="fa-solid fa-finger-point-up"></i>Login to Apply</a
                                >
                                @endif
                                

                                <a
                                    href="{{$listing->website}}"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                >
                            </div>
                        </div>
                    </div>
                </x-card>

                {{-- <x-card class="mt-4 p-2 flex space-x-6">
                    <a href="/listings/{{$listing->id}}/edit">
                      <i class="fa-solid fa-pencil"></i> Edit
                    </a>

                    <form method="POST" action="/listings/{{$listing->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                      </form>
                </x-card> --}}

            </div>
            {{-- <script type="text/javascript">
                function applyJob(id){
                    if (confirm("Are you sure you want to apply on this job?")) {
                        $.ajax({
                            url : '/listings/{{$listing->id}}/apply',
                            type: 'post',
                            data: {id:id},
                            dataType: 'json',
                            success: function(response) {
                                window.location.href = "{{ url()->current() }}";
                            } 
                        });
                    }
                }
                
                
                </script> --}}
@endsection