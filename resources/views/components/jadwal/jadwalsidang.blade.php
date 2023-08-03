@props(['jadwal'])

<div class="p-4 sm:ml-64">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-14">
        {{--        {{ print_r($jadwal) }}--}}
        @foreach($jadwal as $jadwal_sidang)
            <div class="p-4 rounded-lg bg-gray-50">
                <div
                    class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jadwal
                        Sidang {{ $jadwal_sidang['nama_sidang'] }}</h5>
                    <form method="POST" action="{{route('update.jadwalsidang', ['id' => $jadwal_sidang['id'] ])}}" >
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="first_name"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                                Sidang {{ $jadwal_sidang['nama_sidang'] }}</label>
                            <input type="date" id="first_name" value="{{$jadwal_sidang['tanggal_sidang']}}"
                                   name="jadwal_sidang"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="John">
                        </div>
                        <br>
                        <button
                            type="submit"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        @endforeach


{{--        <div class="p-4 rounded-lg bg-gray-50">--}}
{{--            <div--}}
{{--                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">--}}
{{--                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jadwal Sidang Tahap--}}
{{--                    2</h5>--}}
{{--                <div>--}}
{{--                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu--}}
{{--                        Sidang Tahap 2</label>--}}
{{--                    <input type="date" id="first_name"--}}
{{--                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"--}}
{{--                           placeholder="John" required>--}}
{{--                </div>--}}
{{--                <br>--}}
{{--                <a href="#"--}}
{{--                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

{{--    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">--}}
{{--        <div class="p-4 rounded-lg bg-gray-50">--}}
{{--            <div--}}
{{--                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">--}}
{{--                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jadwal Sidang Tahap--}}
{{--                    3</h5>--}}
{{--                <div>--}}
{{--                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu--}}
{{--                        Sidang Tahap 3</label>--}}
{{--                    <input type="date" id="first_name"--}}
{{--                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"--}}
{{--                           placeholder="John" required>--}}
{{--                </div>--}}
{{--                <br>--}}
{{--                <a href="#"--}}
{{--                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="p-4 rounded-lg bg-gray-50">--}}
{{--            <div--}}
{{--                class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">--}}
{{--                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jadwal Sidang Tahap--}}
{{--                    4</h5>--}}
{{--                <div>--}}
{{--                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu--}}
{{--                        Sidang Tahap 4</label>--}}
{{--                    <input type="date" id="first_name"--}}
{{--                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"--}}
{{--                           placeholder="John" required>--}}
{{--                </div>--}}
{{--                <br>--}}
{{--                <a href="#"--}}
{{--                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>


