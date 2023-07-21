<!-- Main modal -->
<div id="detailMahasiswa{{ $datamahasiswa['id'] }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="detailMahasiswa{{ $datamahasiswa['id'] }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Detail User Mahasiswa</h3>
                <div class="space-y-6 text-left">
{{--Show data nama lengkap--}}
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $datamahasiswa['nama'] }}</span>
                    </div>
{{--show data nomor identitas--}}
                    <div>
                        <label for="nomor_identitas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Identitas</label>
                        <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $datamahasiswa['nomor_identitas'] }}</span>
                    </div>
{{--show data username--}}
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $datamahasiswa['username'] }}</span>
                    </div>
{{--show data prodi--}}
                    <div>
                        <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prodi</label>
                        <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $datamahasiswa['mahasiswa_id']['prodi'] }}</span>
                    </div>
{{--show data judul skripsi--}}
                    <div>
                        <label for="judul_skripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Skripsi</label>
                        <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $datamahasiswa['mahasiswa_id']['judul_skripsi'] }}</span>
                    </div>
{{--show data nama dosen 1--}}
                    <div>
                        <label for="nama_dosen1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dosen Pembimbing 1</label>
                        <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $datamahasiswa['mahasiswa_id']['nama_dosen1'] }}</span>
                    </div>
{{--show data nama dosen 2--}}
                    <div>
                        <label for="nama_dosen2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dosen Pembimbing 2</label>
                        <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $datamahasiswa['mahasiswa_id']['nama_dosen2'] }}</span>
                    </div>
{{--show data jadwal pengambilan ijazah--}}
                    <div>
                        <label for="jadwal_pengambilan_ijazah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jadwal Pengambilan Ijazah</label>
                        <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $datamahasiswa['mahasiswa_id']['jadwal_pengambilan_ijazah'] }}</span>
                    </div>
{{--show data sidang 1--}}
                    <div>
                        <label for="sidang_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jadwal Sidang</label>
{{--pengecekan jika jadwal tidak ada.--}}
                        @if($datamahasiswa['mahasiswa_id']['sidang_id'] != 'Belum Di Jadwalkan')
                            <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2">{{ $datamahasiswa['mahasiswa_id']['sidang_id']['nama_sidang'] }}</span>
                            <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2">{{ $datamahasiswa['mahasiswa_id']['sidang_id']['tanggal_sidang'] }}</span>
                        @elseif($datamahasiswa['mahasiswa_id']['sidang_id'] == 'Belum Di Jadwalkan')
                            <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2">{{ $datamahasiswa['mahasiswa_id']['sidang_id'] }}</span>
                        @endif
                    </div>
{{--show data status--}}
                    <div>
                        <label for="status_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $datamahasiswa['mahasiswa_id']['status_id']['nama_status'] }}</span>
                    </div>
{{--show data hasil_sidang_id--}}
                    <div>
                        <label for="hasil_sidang_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hasil Sidang</label>
                        <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $datamahasiswa['mahasiswa_id']['hasil_sidang_id'] }}</span>
                    </div>
{{--show data verifikasi_id panitia--}}
                    <div>
                        <label for="verifikasi_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Verifikasi Panitia</label>
                        <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia'] }}</span>
                    </div>
{{--show data verifikasi_id akademik--}}
                    <div>
                        <label for="verifikasi_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Verifikasi Akademik</label>
                        <span class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">{{ $datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_akademik'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
