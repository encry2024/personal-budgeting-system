<div>
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-61 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-white-50 bg-white">
            <a href="#" class="mb-4">
                <span class="text-lg font-semibold text-gray-700">Welcome, {{ $userName }}</span>
                <span class="text-xl font-semibold text-blue-500">Personal Budget Tracker</span>
            </a>

            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}" class="
                        flex
                        items-center
                        p-2
                        text-gray-500
                        rounded-lg
                        hover:bg-gray-100
                        dark:hover:text-white
                        dark:hover:bg-gray-600
                        active:bg-gray-600
                        rounded-2
                        mt-7
                        group">
                        <svg
                            class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('expense.index') }}" class="
                        flex
                        items-center
                        p-2
                        text-gray-500
                        rounded-lg
                        hover:bg-gray-100
                        dark:hover:text-white
                        dark:hover:bg-gray-600
                        active:bg-gray-600
                        rounded-2
                        group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" 
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="ms-3">Expenses</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</div>
