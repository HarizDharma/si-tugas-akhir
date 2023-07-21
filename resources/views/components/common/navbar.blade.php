{{--
ini isi ata dari yang sudah login
--}}
@props(['nama', 'role'])

<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                @if($role == 'akademik')
                    {{--jika yang login akademik ganti route--}}
                    <a href="{{ route('akademik') }}" class="flex ml-2 md:mr-24">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="h-8 mr-3" alt="FlowBite Logo" />
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Sistem Informasi Manajemen Sidang</span>
                    </a>
                @elseif($role == 'panitia')
                    <a href="{{ route('panitia') }}" class="flex ml-2 md:mr-24">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="h-8 mr-3" alt="FlowBite Logo" />
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Sistem Informasi Manajemen Sidang</span>
                    </a>
                @elseif($role == 'mahasiswa')
                    <a href="{{ route('mahasiswa') }}" class="flex ml-2 md:mr-24">
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="h-8 mr-3" alt="FlowBite Logo" />
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Sistem Informasi Manajemen Sidang</span>
                    </a>
                @endif
            </div>
            <div class="flex items-center">
                <div class="flex items-center ml-3">
                    <div>
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{ $nama }}
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                @if($role == 'akademik')
                                    {{--jika yang login akademik ganti route--}}
                                    <a href="{{ route('akademik') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                                @elseif($role == 'panitia')
                                    <a href="{{ route('panitia') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                                @elseif($role == 'mahasiswa')
                                    <a href="{{ route('mahasiswa') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                                @endif
                            </li>

                            <x-logout/>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
