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
                    Expense Category
                </h1>

                <a href="{{ route('expense.create') }}" class="text-[14px] flex items-center gap-2 text-md border-none
                rounded-md bg-blue-500 py-2 px-4 text-white shadow-xl hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
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
                        @foreach($expenses as $expense)
                            <tr class="group">
                                <td class="border border-gray-300 px-4 py-2 group-hover:bg-gray-50">
                                    {{ $expense->name }}

                                    <button
                                       class="delete-expense flex items-center gap-2 text-[14px] rounded-md bg-red-600 py-2 px-2
                                       text-white w-8 shadow-xl float-right dark:bg-red-700 hover:bg-red-800
                                       text-center ml-1"
                                        data-expense-id="{{ $expense->id }}"
                                        data-expense-name="{{ $expense->name }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346
                                            9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16
                                            19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772
                                            5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114
                                            1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5
                                            0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32
                                            0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>

                                    <a href="{{ route('expense.edit', $expense->id) }}"
                                       class="flex items-center gap-2 text-[14px] rounded-md bg-green-500 py-2 px-2
                                       text-white w-8 shadow-xl float-right dark:bg-green-600 hover:bg-green-700
                                       text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-4 h-4"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832
                                                  19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1
                                                  1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="module">
        $('.delete-expense').on('click', function (e) {
            let expenseName =  $(this).attr('data-expense-name');

            Swal.fire({
                title: 'Delete Expense',
                html: `Are you sure you want to delete ${expenseName}?`,
                type: 'warning',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#ea5b5b',
                cancelButtonText: 'Cancel',
            });
        });
    </script>
@endsection
