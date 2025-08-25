<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white-50 bg-white">
        <a href="#" class="mb-4">
            <span class="text-xl font-semibold text-blue-500">Personal Budget Tracker</span>
        </a>

        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                class="
                    flex border-solid shadow-md items-center p-3 text-gray-500 rounded-lg hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-600 active:bg-gray-600 rounded-2 mt-10 group

                    @if(request()->route()->getName() === 'dashboard')
                        bg-gray-600 text-white
                    @endif
                ">
                    <svg class="
                        w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white

                        @if(request()->route()->getName() === 'dashboard')
                            dark:text-white
                        @endif
                    " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                    </svg>

                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            @php
                $isExpenseSection = request()->routeIs('expense.*') || request()->routeIs('attribute.*') || request()->routeIs('category.*');
            @endphp

            <li>
                <div class="flex items-center p-3 text-gray-500 rounded-lg">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-2"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 
                            1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 
                            12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 
                            0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 
                            0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="text-base font-medium">Expenses</span>
                </div>

                <ul class="pl-10 pr-4 mt-2 space-y-1 text-sm">
                    <li>
                        <a href="{{ route('expense.index') }}"
                           class="block p-2 rounded-lg hover:bg-gray-100 {{ request()->routeIs('expense.index') ? 'bg-gray-600 text-white hover:text-gray-500' : 'text-gray-600' }}">
                           All Expenses
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('category.index') }}"
                           class="block p-2 rounded-lg hover:bg-gray-100 {{ request()->routeIs('category.index') ? 'bg-gray-600 text-white hover:text-gray-500' : 'text-gray-600' }}">
                           Categories
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('attribute.index') }}"
                           class="block p-2 rounded-lg hover:bg-gray-100 {{ request()->routeIs('attribute.index') ? 'bg-gray-600 text-white hover:text-gray-500' : 'text-gray-600' }}">
                           Attributes
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ route('user.settings') }}"
                class="
                    flex border-solid shadow-md items-center p-3 mt-5 text-gray-500 rounded-lg hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-600 active:bg-gray-600 rounded-2 group

                    @if(request()->route()->getName() === 'user.settings')
                        bg-gray-600 text-white
                    @endif
                ">
                    <svg class="
                        w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white

                        @if(request()->route()->getName() === 'user.settings')
                            dark:text-white
                        @endif
                    " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <span class="ms-3">User Settings</span>
                </a>
            </li>

            {{-- <li>
                <a href="{{ route('dashboard') }}"
                class="
                    flex border-solid shadow-md items-center p-3 mt-5 text-gray-500 rounded-lg hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-600 active:bg-gray-600 rounded-2 group

                    @if(request()->route()->getName() === 'expense.index')
                        bg-gray-600 text-white
                    @endif
                ">
                    <svg class="
                        w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white

                        @if(request()->route()->getName() === 'expense.index')
                            dark:text-white
                        @endif
                    " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                    </svg>
                    <span class="ms-3">Reports</span>
                </a>
            </li> --}}
        </ul>
    </div>
</aside>

