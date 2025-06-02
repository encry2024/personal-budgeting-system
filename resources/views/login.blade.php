@extends('template')

@section('content')
<form method="POST" action="{{ route('authenticate') }}">
    {{ csrf_field() }}
    <div class="h-screen flex items-center justify-center">
        <div class="border-2 border-none rounded-md pl-8 pb-8 pr-8 pt-2 bg-white drop-shadow-md w-xl">
            <h1 class="text-2xl">Personalized Budgeting System</h1>

            <hr class="mb-4" />

            @if($errors->has('email'))
            <div class="mt-3 mb-3 p-3 bg-red-700 border-2 border-none rounded-md">
                <label class="text-white">{{ $errors->first('email') }}</label>
            </div>
            @endif

            @if(session('message'))
            <div class="mt-3 mb-3 p-3 bg-green-600 border-2 border-none rounded-md">
                <label class="text-white">{{ session('message') }}</label>
            </div>
            @endif

            <label class="block">
                <span class="text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Email</span>
                <input type="email" name="email" class="block w-full rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-sky-500 focus:outline focus:outline-sky-500 sm:text-sm" placeholder="you@example.com" />
            </label>

            <label class="block mt-4">
                <span class="text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Password</span>
                <input type="password" name="password" class="block w-full rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-sky-500 focus:outline focus:outline-sky-500 sm:text-sm" />
            </label>

            <div class="block mt-4">
                <button class="rounded-md bg-sky-500 hover:bg-sky-700 py-2 px-2 text-white w-30 shadow-xl">Login</button>
                <a href="{{ route('user.create') }}" class="border-2 border-none rounded-md bg-gray-300 py-2 px-2 text-white w-30 shadow-xl float-right bg-green-500 hover:bg-green-700 text-center">Register</a>
            </div>
        </div>
    </div>
</form>
@endsection
