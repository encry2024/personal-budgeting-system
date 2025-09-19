@extends('template')

@section('content')
<form method="POST" action="{{ route('user.store') }}">
    @csrf
    <div class="h-screen flex items-center justify-center">
        <div class="border-2 border-none rounded-md pl-8 pb-8 pr-8 pt-2 bg-white drop-shadow-md w-xl">
            <h1 class="text-2xl">Register your account</h1>

            <hr class="mb-4" />

            @if($errors->any())
            <div class="mt-3 mb-3 p-3 bg-red-500 border-2 border-none rounded-md">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-white">
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <label class="block">
                <span class="text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">First Name</span>
                <input type="string" name="first_name" class="block w-full rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-sky-500 focus:outline focus:outline-sky-500 sm:text-sm" />
            </label>

            <label class="block mt-4">
                <span class="text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Middle Name</span>
                <input type="string" name="middle_name" class="block w-full rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-sky-500 focus:outline focus:outline-sky-500 sm:text-sm" />
            </label>

            <label class="block mt-4">
                <span class="text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Last Name</span>
                <input type="string" name="last_name" class="block w-full rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-sky-500 focus:outline focus:outline-sky-500 sm:text-sm" />
            </label>

            <label class="block mt-4">
                <span class="text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">E-mail</span>
                <input type="string" name="email" class="block w-full rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-sky-500 focus:outline focus:outline-sky-500 sm:text-sm" placeholder="your@example.com"/>
            </label>

            <label class="block mt-4">
                <span class="text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Password</span>
                <input type="password" name="password" class="block w-full rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-sky-500 focus:outline focus:outline-sky-500 sm:text-sm" />
            </label>

            <label class="block mt-4">
                <span class="text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Confirm Password</span>
                <input type="password" name="password_confirmation" class="block w-full rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-sky-500 focus:outline focus:outline-sky-500 sm:text-sm" />
            </label>

            <div class="block mt-4">
                <button type="submit" class="rounded-md bg-green-500 py-2 px-2 text-white w-30 shadow-xl hover:bg-green-700">Register</button>
                <a href="{{ route('login') }}" class="border-2 border-none rounded-md bg-gray-300 py-2 px-2 text-white w-30 shadow-xl float-right dark:bg-gray-500 hover:bg-gray-700 text-center">Cancel</a>
            </div>
        </div>
    </div>
</form>
@endsection
