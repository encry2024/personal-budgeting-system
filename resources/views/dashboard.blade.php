@extends('template')

@section('content')
<div class="grid grid-cols-[256px_1fr] gap-4">
    <div class="">
        <x-sidebar>
        </x-sidebar>
    </div>

    <div class="p-5 mr-10">
        <div class="flex justify-center dark:bg-white border-md border-solid rounded-md w-full mt-5 p-3 inline-block">
            <p>Hi,
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 inline-block align-middle text-blue-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>

                <span>
                    {{ $userName }}
                </span>
            </p>
        </div>

        <div class="flex justify-center dark:bg-white border-md border-solid rounded-md w-full mt-5 p-3 inline-block h-full">

        </div>
    </div>
</div>
@endsection
