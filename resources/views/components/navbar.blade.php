<nav class="accent-color mb-10">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href='/' class="flex items-center">
            <h1 class="text-center text-[25px] uppercase text-white"><span class="font-black">Code</span>Arena</h1>
        </a>
        <div class="flex items-center md:order-2">
            <ul class="md:flex text-white gap-5 hidden text-[20px] mr-6">
                <li class="p-2 bg-gray-400"><a href="/">Contest</a></li>
                <li class="p-2 bg-gray-400"><a href="{{ route('problem-set') }}">Problem Set</a></li>
            </ul>
            @if(auth()->check())
            <button type="button" class="flex mr-3 md:mr-0 text-white rounded-full w-12 h-12 items-center justify-center" style="background: rgba(255, 255, 255, 0.3)" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="text-2xl">
                    @auth
                    {{ Str::upper(substr(auth()->user()->name, 0, 1)) }}
                    @endauth
                </span>

            </button>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">
                        @auth
                        {{ auth()->user()->name }}
                        @endauth
                    </span>
                    <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">
                        @auth
                        {{ auth()->user()->email }}
                        @endauth
                    </span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('submissions') }}">My Submissions</a>
                    </li>
                </ul>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" href={{ route('logout') }}>Log out</a>
                    </li>
                </ul>
            </div>
            @else
            <a href="{{ route('login') }}" class="p-2 bg-transparent border hover:bg-white hover:text-black transition-all duration-10 text-[20px] text-white">Login</a>
            @endif
            <button type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center md:hidden" data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example">
                <svg width="40px" height="40px" viewBox="0 -62.5 1149 1149" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <path d="M88.413908 447.562927A38.462439 38.462439 0 0 1 49.951469 409.100488v-65.93561A318.439024 318.439024 0 0 1 368.140738 24.97561h412.597073A318.439024 318.439024 0 0 1 1098.927079 343.164878v65.93561a38.462439 38.462439 0 0 1-38.462439 38.462439z" fill="#FDCA89" />
                    <path d="M780.737811 49.95122A293.463415 293.463415 0 0 1 1073.951469 343.164878v65.93561a13.486829 13.486829 0 0 1-13.486829 13.486829H88.413908a13.486829 13.486829 0 0 1-13.486829-13.486829v-65.93561A293.463415 293.463415 0 0 1 368.140738 49.95122h412.597073m0-49.95122H368.140738A343.164878 343.164878 0 0 0 24.97586 343.164878v65.93561a63.438049 63.438049 0 0 0 63.438048 63.438049h972.050732A63.438049 63.438049 0 0 0 1123.902689 409.100488v-65.93561A343.164878 343.164878 0 0 0 780.737811 0z" fill="#5C2D51" />
                    <path d="M153.100738 999.02439A103.149268 103.149268 0 0 1 49.951469 895.625366v-69.681951a33.217561 33.217561 0 0 1 33.217561-33.217561h982.540488A33.217561 33.217561 0 0 1 1098.927079 825.943415v69.681951A103.149268 103.149268 0 0 1 996.027567 999.02439z" fill="#FDCA89" />
                    <path d="M1065.709518 817.451707a8.241951 8.241951 0 0 1 8.241951 8.241952v69.681951A78.173659 78.173659 0 0 1 996.027567 974.04878H153.100738A78.173659 78.173659 0 0 1 74.927079 895.625366v-69.681951a8.241951 8.241951 0 0 1 8.241951-8.241952h982.540488m0-49.951219H83.16903A58.193171 58.193171 0 0 0 24.97586 825.943415v69.681951A128.124878 128.124878 0 0 0 153.100738 1024h842.926829A128.124878 128.124878 0 0 0 1123.902689 895.625366v-69.681951a58.193171 58.193171 0 0 0-58.193171-58.193171z" fill="#5C2D51" />
                    <path d="M84.417811 607.406829h980.292683A59.441951 59.441951 0 0 1 1123.902689 666.599024v66.435122a59.192195 59.192195 0 0 1-59.192195 59.192195H84.417811A59.441951 59.441951 0 0 1 24.97586 733.034146v-66.435122a59.441951 59.441951 0 0 1 59.441951-59.192195z" fill="#9FDBAD" />
                    <path d="M1064.710494 632.382439A34.466341 34.466341 0 0 1 1098.927079 666.599024v66.435122a34.466341 34.466341 0 0 1-34.216585 34.466342H84.417811A34.466341 34.466341 0 0 1 49.951469 733.034146v-66.435122a34.466341 34.466341 0 0 1 34.466342-34.216585h980.292683m0-49.951219H84.417811A84.167805 84.167805 0 0 0 0.00025 666.599024v66.435122a84.167805 84.167805 0 0 0 84.417561 84.417561h980.292683A84.167805 84.167805 0 0 0 1148.878299 733.034146v-66.435122a84.167805 84.167805 0 0 0-84.167805-84.167804z" fill="#5C2D51" />
                    <path d="M74.927079 447.562927h999.02439v157.845853H74.927079z" fill="#F05071" />
                    <path d="M1048.97586 472.538537v107.894634H99.902689v-107.894634h949.073171m49.951219-49.95122H49.951469v207.797073h1048.97561v-207.797073zM445.565128 190.813659h-49.95122a24.97561 24.97561 0 0 1 0-49.95122h49.95122a24.97561 24.97561 0 0 1 0 49.95122zM771.746591 190.813659h-49.951219a24.97561 24.97561 0 0 1 0-49.95122h49.951219a24.97561 24.97561 0 0 1 0 49.95122zM609.90464 342.165854h-49.951219a24.97561 24.97561 0 0 1 0-49.95122h49.951219a24.97561 24.97561 0 0 1 0 49.95122zM282.724152 342.165854h-49.951219a24.97561 24.97561 0 0 1 0-49.95122h49.951219a24.97561 24.97561 0 0 1 0 49.95122zM910.361225 359.64878h-49.951219a24.97561 24.97561 0 0 1 0-49.951219h49.951219a24.97561 24.97561 0 0 1 0 49.951219z" fill="#5C2D51" />
                </svg>
            </button>
        </div>
        <div id="drawer-example" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label">
            <h5 id="drawer-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">Codearena</h5>
            <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <ul>
                <li class="mb-3 p-[6px] px-[8px] bg-amber-300">
                    <a href="/">
                        <h5>Contests</h5>
                    </a>
                </li>
                <li class="p-[6px] px-[8px]">
                    <a href="/">
                        <h5>Problem set</h5>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>

