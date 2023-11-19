<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="">
        <div class="flex items-center justify-between accent-color px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a class="flex items-center" href={{ route('admin.dashboard') }}>
                    <h1 class="text-center text-[25px] uppercase text-white"><span class="font-black">Code</span>Arena</h1>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button" class="text-white flex text-sm bg-gray-800 rounded-full w-12 h-12 items-center justify-center" aria-expanded="false" data-dropdown-toggle="dropdown-user" style="background: rgba(255, 255, 255, 0.3)">
                                <span class="text-2xl">
                                    @auth
                                        {{ Str::upper(substr(auth()->user()->name, 0, 1)) }}
                                    @endauth
                                </span>
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                                <span class="block text-sm text-gray-900 dark:text-white">
                                    @auth
                                        {{ auth()->user()->name }} @if(Auth::user()->role === 'admin') <sup class="text-primary">admin</sup> @endif
                                    @endauth
                                </span>
                            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">
                                    @auth
                                    {{ auth()->user()->email }}
                                @endauth
                                </span>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href={{ route('admin.logout') }} >Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                        <path d="M16.5 20.5H7.5" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                        <path d="M13 18.5C13 19.0523 12.5523 19.5 12 19.5C11.4477 19.5 11 19.0523 11 18.5H13ZM11 18.5V16H13V18.5H11Z" fill="#33363F"/>
                        <path d="M10.5 9.5H13.5" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                        <path d="M5.5 14.5C5.5 14.5 3.5 13 3.5 10.5C3.5 9.73465 3.5 9.06302 3.5 8.49945C3.5 7.39488 4.39543 6.5 5.5 6.5V6.5C6.60457 6.5 7.5 7.39543 7.5 8.5V9.5" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                        <path d="M18.5 14.5C18.5 14.5 20.5 13 20.5 10.5C20.5 9.73465 20.5 9.06302 20.5 8.49945C20.5 7.39488 19.6046 6.5 18.5 6.5V6.5C17.3954 6.5 16.5 7.39543 16.5 8.5V9.5" stroke="#33363F" stroke-width="2" stroke-linecap="round"/>
                        <path d="M16.5 11.3593V7.5C16.5 6.39543 15.6046 5.5 14.5 5.5H9.5C8.39543 5.5 7.5 6.39543 7.5 7.5V11.3593C7.5 12.6967 8.16841 13.9456 9.2812 14.6875L11.4453 16.1302C11.7812 16.3541 12.2188 16.3541 12.5547 16.1302L14.7188 14.6875C15.8316 13.9456 16.5 12.6967 16.5 11.3593Z" stroke="#33363F" stroke-width="2"/>
                    </svg>
                    <span class="ms-3">Create contest</span>
                </a>
            </li>
            <li>
                <a class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group" href={{ route('super-admin.question.index') }}>
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.667 8l13.938-8 13.943 8 0.12 15.932-14.063 8.068-13.938-8zM5.453 11.307v6.344l4.458 2.479v4.688l5.297 3.063v-11.031zM27.771 11.307l-9.755 5.542v11.031l5.292-3.063v-4.682l4.464-2.484zM6.844 8.802l9.74 5.526 9.76-5.573-5.161-2.932-4.547 2.594-4.573-2.625z"/>
                    </svg>
                    <span class="ms-3">Add problems</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

