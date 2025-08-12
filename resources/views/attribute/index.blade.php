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
                    Expense Attributes
                </h1>

                <a href="{{ route('attribute.create') }}" class="text-[14px] flex items-center gap-2 text-md border-none
                rounded-md bg-blue-500 py-2 px-4 text-white shadow-xl hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>

                    Create Expense Attribute
                </a>
            </div>
        </div>

        <div class="grid">
            <div class="flex flex-wrap flex-row dark:bg-white border-md border-solid rounded-md p-3 mt-5">
                @if(count($attributes) === 0)
                    <div class="mt-3 mb-3 p-3 bg-sky-200 border-2 border-none rounded-md">
                        <label class="text-black">There are no attributes to be displayed</label>
                    </div>
                @else
                    @foreach($attributes as $attribute)
                    <div class="inline-flex items-center mt-3 mb-3 p-3 bg-sky-200 rounded-md w-fit m-1">
                        <label class="flex items-center text-black text-[14px]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                            </svg>
                            {{ $attribute->name }}
                        </label>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
