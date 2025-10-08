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

                {{-- <a href="{{ route('expense.create') }}" class="text-[14px] flex items-center gap-2 text-md border-none
                rounded-md bg-blue-500 py-2 px-4 text-white shadow-xl hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>

                    Create Expense Category
                </a> --}}
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2 flex flex-col dark:bg-white border-md border-solid rounded-md w-full p-3 mt-5">
                <table class="table-auto w-full border-collapse border border-gray-300 mt-5 mb-5">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">Expense Type</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Expense</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($expenses->whereNull('deleted_at') as $expense)
                            <tr class="group">
                                <td class="border border-gray-300 px-4 py-2 group-hover:bg-gray-50">{{ $expense->category->name }}</td>
                                <td class="border border-gray-300 px-4 py-2 group-hover:bg-gray-50">{{ $expense->name }}</td>
                                <td class="border border-gray-300 px-4 py-2 group-hover:bg-gray-50">
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

                                    <a href="{{ route('expense.show', $expense->id) }}"
                                       class="flex items-center gap-2 text-[14px] rounded-md bg-green-500 py-2 px-2
                                       text-white w-8 shadow-xl float-right dark:bg-green-600 hover:bg-green-700
                                       text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-4 h-4"
                                             aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg>

                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col dark:bg-white border-md border-solid rounded-md w-full p-3 mt-5">
                <div class="">
                    <table class="table-auto w-full border-collapse border border-gray-300 mt-5 mb-5">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">Temporarily Deleted Expenses</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($expenses->whereNotNull('deleted_at') as $temporarilyDeletedExpense)
                            <tr class="group">
                                <td class="border border-gray-300 px-4 py-2 group-hover:bg-gray-50">
                                    {{ $temporarilyDeletedExpense->name }}

                                    <button class="permanently-delete-expense flex items-center gap-2 text-[14px] rounded-md bg-red-600 py-2 px-2
                                           text-white w-8 shadow-xl float-right dark:bg-red-700 hover:bg-red-800
                                           text-center ml-1"
                                            data-expense-id="{{ $temporarilyDeletedExpense->id }}"
                                            data-expense-name="{{ $temporarilyDeletedExpense->name }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4">
                                            <path
                                                fill-rule="evenodd"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" clip-rule="evenodd" />
                                        </svg>

                                    </button>

                                    <button
                                        class="delete-expense flex items-center gap-2 text-[14px] rounded-md bg-red-600 py-2 px-2
                                           text-white w-8 shadow-xl float-right dark:bg-red-700 hover:bg-red-800
                                           text-center ml-1"
                                        data-expense-id="{{ $temporarilyDeletedExpense->id }}"
                                        data-expense-name="{{ $temporarilyDeletedExpense->name }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M8.128 9.155a3.751 3.751 0 1 1 .713-1.321l1.136.656a.75.75 0 0 1 .222 1.104l-.006.007a.75.75 0 0 1-1.032.157 1.421 1.421 0 0 0-.113-.072l-.92-.531Zm-4.827-3.53a2.25 2.25 0 0 1 3.994 2.063.756.756 0 0 0-.122.23 2.25 2.25 0 0 1-3.872-2.293ZM13.348 8.272a5.073 5.073 0 0 0-3.428 3.57 5.08 5.08 0 0 0-.165 1.202 1.415 1.415 0 0 1-.707 1.201l-.96.554a3.751 3.751 0 1 0 .734 1.309l13.729-7.926a.75.75 0 0 0-.181-1.374l-.803-.215a5.25 5.25 0 0 0-2.894.05l-5.325 1.629Zm-9.223 7.03a2.25 2.25 0 1 0 2.25 3.897 2.25 2.25 0 0 0-2.25-3.897ZM12 12.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                            <path d="M16.372 12.615a.75.75 0 0 1 .75 0l5.43 3.135a.75.75 0 0 1-.182 1.374l-.802.215a5.25 5.25 0 0 1-2.894-.051l-5.147-1.574a.75.75 0 0 1-.156-1.367l3-1.732Z" />
                                        </svg>
                                    </button>

                                    <button class="restore-expense flex items-center gap-2 text-[14px] rounded-md
                                    bg-sky-500 py-2 px-2 text-white w-8 shadow-xl float-right dark:bg-sky-600
                                    hover:bg-sky-700 text-center"
                                            data-expense-id="{{ $temporarilyDeletedExpense->id }}"
                                            data-expense-name="{{ $temporarilyDeletedExpense->name }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4">
                                            <path
                                                fill-rule="evenodd"
                                                d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903
                                                1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75
                                                0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0
                                                1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548
                                                3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0
                                                0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0
                                                15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="module">
        $('.delete-expense').on('click', function (e) {
            let expenseName = $(this).attr('data-expense-name');
            let expenseId = $(this).attr('data-expense-id');

            let urlString = "{{ route('expense.destroy', ":expenseId") }}";
            let deleteRoute = urlString.replace(':expenseId', expenseId);

            Swal.fire({
                title: 'Delete Expense',
                html: `Are you sure you want to delete ${expenseName}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#ea5b5b',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: deleteRoute,
                        dataType: 'json',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (data, textStatus, xhr) {
                            if (xhr.status === 200) {
                                Swal.fire({
                                    title: 'Deleted Successfully',
                                    icon: 'success',
                                    html: `${data.message}`,
                                    confirmButtonText: 'Ok',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    icon: 'error',
                                    html: `${data.message}`,
                                    confirmButtonText: 'Ok',
                                });
                            }
                        }
                    });
                }
            });
        });

        $('.restore-expense').on('click', function (e) {
            let expenseName = $(this).attr('data-expense-name');
            let expenseId = $(this).attr('data-expense-id');

            let urlString = "{{ route('expense.restore', ":expenseId") }}";
            let restoreRoute = urlString.replace(':expenseId', expenseId);

            Swal.fire({
                title: 'Restore Expense',
                html: `Are you sure you want to restore ${expenseName}?`,
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Restore',
                confirmButtonColor: '#1e9520',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: restoreRoute,
                        dataType: 'json',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (data, textStatus, xhr) {
                            if (xhr.status === 200) {
                                Swal.fire({
                                    title: 'Expense restored successfully',
                                    icon: 'success',
                                    html: `${data.message}`,
                                    confirmButtonText: 'Ok',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    icon: 'error',
                                    html: `${data.message}`,
                                    confirmButtonText: 'Ok',
                                });
                            }
                        }
                    });
                }
            });
        });

        $('.permanently-delete-expense').on('click', function (e) {
            let expenseName = $(this).attr('data-expense-name');
            let expenseId = $(this).attr('data-expense-id');

            let urlString = "{{ route('expense.force_delete', ":expenseId") }}";
            let permanentDeleteRoute = urlString.replace(':expenseId', expenseId);

            Swal.fire({
                title: 'Permanently Delete Expense',
                html: `Are you sure you want to permanently delete ${expenseName}? Expense`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Permanently Delete',
                confirmButtonColor: '#ea5b5b',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: permanentDeleteRoute,
                        dataType: 'json',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (data, textStatus, xhr) {
                            if (xhr.status === 200) {
                                Swal.fire({
                                    title: 'Delete Expense Permanently',
                                    icon: 'success',
                                    html: `${data.message}`,
                                    confirmButtonText: 'Ok',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    icon: 'error',
                                    html: `${data.message}`,
                                    confirmButtonText: 'Ok',
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
