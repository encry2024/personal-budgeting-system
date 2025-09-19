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
                    Edit Expense Category: {{ $category->name }}
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
                <form method="POST" action="{{ route('category.update', $category->id) }}">
                    @csrf
                    <label class="inline-block mb-5">
                        <span class="text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">category Name: </span>
                        <input type="string" id="category-name" name="name" class="inline-block w-100 rounded-md border
                        border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm
                        focus:border-sky-500 focus:outline focus:outline-sky-500 sm:text-sm"
                        value="{{ $category->name }}"/>
                    </label>

                    <div class="block mt-4">
                        <button id="category-update-btn" type="submit" class="text-[14px] rounded-md bg-green-700 py-2 px-2 text-white w-30 shadow-xl
                    hover:bg-green-600">Update</button>

                        <a href="{{ route('category.index') }}" class="text-[14px] border-2 border-none rounded-md
                    bg-gray-300 py-2 px-2 text-white w-30 shadow-xl float-right dark:bg-gray-500
                    hover:bg-gray-700 text-center">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="module">
    $(document).ready(function () {
        const categoryName = "{{ $category->name }}";

        $("#category-update-btn").click(function (e) {
            if (categoryName === $("#category-name").val()) {
                e.preventDefault();

                Swal.fire({
                    title: 'No Changes',
                    icon: 'info',
                    html: 'No changes were made since there were no update on the category name.',
                    confirmButtonText: 'Ok',
                });
            }
        });
    });
</script>
@endsection
