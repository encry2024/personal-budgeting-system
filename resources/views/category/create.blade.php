@extends('template')

@section('content')
<div class="grid grid-cols-[256px_1fr] gap-4">
    <div>
        <x-sidebar>
        </x-sidebar>
    </div>

    <div class="p-5 mr-10 mt-8">
        <div class="flex flex-col dark:bg-white border-md border-solid rounded-md w-full p-3">
            <div class="flex justify-between items-center">
                <h1 class="text-xl text-gray-600">
                    Create Expense Category
                </h1>
            </div>
        </div>

        @if(request()->session()->has('message'))
            <div class="mt-5 p-3 {{ session('messageColor') }} border-2 border-none rounded-md">
                <label class="text-white">{{ session('message') }}</label>
            </div>
        @endif

        <div class="flex flex-col dark:bg-white border-md border-solid rounded-md w-full p-3 mt-5">
            <div class="m-3">
                <form method="POST" action="{{ route('category.store') }}" class="space-y-4">
                    @csrf
                    
                    <div class="flex items-center gap-4">
                        <label for="name" class="w-40 text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">
                            Category Name:
                        </label>
                        <input type="text" id="name" name="name" 
                            class="w-[40%] rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm
                                   focus:border-sky-500 focus:outline focus:outline-sky-500 sm:text-sm" />
                    </div>

                    <div class="block pt-4 mt-4">
                        <button type="submit" 
                            class="text-[14px] rounded-md bg-green-700 py-2 px-4 text-white shadow-xl
                                   hover:bg-green-600">
                            Create
                        </button>

                        <a href="{{ route('category.index') }}" 
                            class="text-[14px] rounded-md bg-gray-500 py-2 px-4 text-white shadow-xl
                                   hover:bg-gray-700 text-center float-right">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
