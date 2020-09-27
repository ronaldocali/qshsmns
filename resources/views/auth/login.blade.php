@extends('layouts.specialFrontend')

@section('content')

<div class="w-full max-w-xs mx-auto loginDiv">
    <form method="POST" action="{{ route('login') }}" class="px-8 pt-6 pb-8 mb-4 loginForm">
        @csrf
        <div class="mb-4">
            <input class="appearance-none border @error('password') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" id="emailaddress" placeholder="Email address">
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <input class="appearance-none border @error('password') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" id="password" placeholder="Password">
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-500 font-bold">
                <input class="mr-2 leading-tight" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="text-sm">
                    Remember Me
                </span>
            </label>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-fill" type="submit">
                Sign In
            </button>
        </div>
    </form>
</div>

@endsection
