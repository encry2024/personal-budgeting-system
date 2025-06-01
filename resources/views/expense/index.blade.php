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
                <h1 class="text-2xl text-gray-600">
                    Expense Category
                </h1>

                <a href="{{ route('expense.create') }}" class="text-[14px] flex items-center gap-2 text-md border-none rounded-md bg-blue-500 py-2 px-4 text-white shadow-xl hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>

                    New Expense
                </a>
            </div>
        </div>

        <div class="flex flex-col dark:bg-white border-md border-solid rounded-md w-full p-3 mt-5">
            <div class="">
                <table class="table-auto w-full border-collapse border border-gray-300 mt-5 mb-5">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">Expenses</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">Games</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">Groceries</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">Loans</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">Credit Cards</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
