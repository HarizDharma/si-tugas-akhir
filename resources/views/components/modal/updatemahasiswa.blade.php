<!-- Main modal -->
<div id="updateMahasiswa{{ $datamahasiswa['id'] }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="updateMahasiswa{{ $datamahasiswa['id'] }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit User Mahasiswa</h3>
                <form class="space-y-6 text-left" action="{{ route('updateMahasiswa', ['id' => $datamahasiswa['id']]) }}" method="POST">
                    @csrf
                    @method('PUT')
{{--get data nama--}}
                    <div>
                        <input type="hidden" name="id" value="{{ $datamahasiswa['id'] }}">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <input type="text" value="{{ $datamahasiswa['nama'] }}" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Nama Mahasiswa" required>
                    </div>
{{--get data nomor_identitas--}}
                    <div>
                        <label for="nomor_identitas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Identitas</label>
                        <input type="text" value="{{ $datamahasiswa['nomor_identitas'] }}" name="nomor_identitas" id="nomor_identitas" placeholder="00000" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
{{--get data username--}}
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" value="{{ $datamahasiswa['username'] }}" name="username" id="username" placeholder="00000" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
{{--get data prodi--}}
                    <div>
                        <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prodi</label>
                        <input type="text" value="{{ $datamahasiswa['mahasiswa_id']['prodi'] }}" name="prodi" id="prodi" placeholder="Teknik Informatika" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
{{--get data judul skripsi--}}
                    <div>
                        <label for="judul_skripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Skripsi</label>
                        <input type="text" value="{{ $datamahasiswa['mahasiswa_id']['judul_skripsi'] }}" name="judul_skripsi" id="judul_skripsi" placeholder="Sistem ...." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
{{--get data dospem 1--}}
                    <div>
                        <label for="nama_dosen1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Dosen Pembimbing 1</label>
                        <input type="text" value="{{ $datamahasiswa['mahasiswa_id']['nama_dosen1'] }}" name="nama_dosen1" id="nama_dosen1" placeholder="Nama Dosen Pembimbing 1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
{{--get data dospem2--}}
                    <div>
                        <label for="nama_dosen2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Dosen Pembimbing 2</label>
                        <input type="text" value="{{ $datamahasiswa['mahasiswa_id']['nama_dosen2'] }}" name="nama_dosen2" id="nama_dosen2" placeholder="Nama Dosen Pembimbing 2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>

                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Simpan Perubahan Mahasiswa
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
