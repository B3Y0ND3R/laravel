@extends('layout')

@section('content')
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Reset Password</h2>
        <p class="mb-4">Reset yout account password</p>
      </header>

      <span style="color: red;">{{ $errors->first('password') }}<br></span>
      <span style="color: red;">{{ $errors->first('password_confirmation') }}<br></span>
      
      <form method="POST" action="{{ url('reset_post/'.$token) }}">
        @csrf
  
    
  
        <div class="mb-6">
            <label
                for="password"
                class="inline-block text-lg mb-2"
            >
                Password
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password"
                value="{{old('password')}}"
            />
            @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}<p>
            @enderror
        </div>

        <div class="mb-6">
            <label
                for="password2"
                class="inline-block text-lg mb-2"
            >
                Confirm Password
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password_confirmation"
                value="{{old('password_confirmation')}}"
            />
            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">{{$message}}<p>
            @enderror
        </div>


  
        <div class="mb-6">
          <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Sign In
          </button>
        </div>
      </form>
    </x-card>
@endsection