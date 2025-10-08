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
                    {{ $expense->name }}
                </h1>
            </div>
        </div>

        <div class="grid gap-4">
            <div class="flex dark:bg-white border-md border-solid rounded-md w-full p-3 mt-5">
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="module">
    </script>
@endsection
