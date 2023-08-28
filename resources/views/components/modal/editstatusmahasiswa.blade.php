<!-- Main modal -->
<div id="editStatusMahasiswa{{ $datamahasiswa['id'] }}" tabindex="-1" aria-hidden="true" class="modal fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editStatusMahasiswa{{ $datamahasiswa['id'] }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Status Mahasiswa</h3>
                <form class="space-y-6" action="{{ route('editStatusMahasiswa', ['id' => $datamahasiswa['mahasiswa_id']['id']]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ $datamahasiswa['mahasiswa_id']['status_id']['nama_status'] }}"  readonly>
                    </div>

                    <div>
                        <label for="status_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ubah Status</label>
                        <select name="status_id" id="status_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option>Pilih status</option>
                            <option value="1">Belum Progress/Proses Mendaftar Sempro</option>
                            <option value="2">Sudah Daftar Sempro</option>
                            <option value="3">Sudah Sidang Sempro dan Mengulangi</option>
                            <option value="4">Sudah Sidang Sempro dan Tidak Mengulangi</option>
                            <option value="5">Sudah Daftar Sidang Akhir</option>
                            <option value="6">Sudah Sidang dan Mengulangi</option>
                            <option value="7">Sudah Sidang dan Tidak Mengulangi</option>
                            <option value="8">Sudah Mengambil Ijazah</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
