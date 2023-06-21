{{--
isi data dengan props yang dilempar dari view akademik kesini
--}}
@props(['data'])

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14 bg-gray-50">
        <div class="flex rounded justify-start">
            <div class="w-1/2 pr-4 mt-5 ml-5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="nama" value="{{ $data['nama'] }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="w-1/2 pl-4 mt-5 mr-5">
                <label for="nomoridentitas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Identitas</label>
                <input type="text" id="nomoridentitas" value="{{ $data['nomor_identitas'] }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
            </div>
        </div>

        <div class="flex rounded bg-gray-50 justify-start">
            <div class="w-1/2 pr-4 mt-5 ml-5">
                <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prodi</label>
                <input type="text" id="prodi" value="{{ $data['mahasiswa_id']['prodi'] }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
            </div>
            <div class="w-1/2 pl-4 mt-5 mr-5">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                <input type="text" id="status" value="{{ $data['mahasiswa_id']['status_id']['nama_status'] }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
            </div>
        </div>

        <div class="flex rounded bg-gray-50 justify-start">
            <div class="w-1/2 pr-4 mt-5 ml-5">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input type="text" id="username" value="{{ $data['username'] }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="w-1/2 pl-4 mt-5 mr-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>

        <div class="flex rounded bg-gray-50 justify-start mb-5">
            <div class="w-1/2 pr-35 mt-5 ml-5">
                <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>



{{--        <div class="grid grid-cols-2 gap-4">--}}
{{--            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">--}}
{{--                <p class="text-2xl text-gray-400 dark:text-gray-500">+</p>--}}
{{--            </div>--}}
{{--        </div>--}}
