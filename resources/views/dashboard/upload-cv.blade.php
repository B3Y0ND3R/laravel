@extends('dashboard.x')


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

@section('p')

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

<div class="home-container" style="width: 70vw;">
        @if(!auth()->user()->cv)
        <form action="/dashboard/applicant/show-cv" method="POST" enctype="multipart/form-data">
            @csrf
        
            <label for="cv" class="block">
                <p class="bg-white text-laravel rounded py-2 px-4">
                You do not have any CV uploaded<br>
                Please upload your CV here:<br>
                </p>
            </label>
            <input
                type="file"
                name="cv"
            />
            @error('cv')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        
            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black block"
                >
                    Upload
                </button>
            </div>
        </form>
        @else
        <div class="text-lg space-y-6">

            <a href="{{ asset('storage/' . auth()->user()->cv) }}" target="_blank" class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-file"></i>
                View CV
            </a>
        </div>
        @endif
        
</div>  
@endsection