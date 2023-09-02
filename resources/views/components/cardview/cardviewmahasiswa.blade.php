@props(['auth'])
{{--


--}}
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 mb-4">
    <div class="bg-gray-50 dark:bg-gray-800 block p-4 sm:p-6 md:p-6 lg:p-6 xl:p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Status :</h5>
        <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['status_id']['nama_status'] }}</h5>
    </div>

    <div class="bg-gray-50 dark:bg-gray-800 block p-4 sm:p-6 md:p-6 lg:p-6 xl:p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Informasi :</h5>
        @if($auth['mahasiswa_id']['status_id']['id'] == 1)
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Silahkan Melakukan Pendaftaran</h5>
        @elseif($auth['mahasiswa_id']['status_id']['id'] == 2)
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Silahkan Tunggu Konfirmasi Panitia</h5>
        @elseif($auth['mahasiswa_id']['status_id']['id'] == 3)
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sudah Sidang Sempro dan Mengulangi</h5>
        @elseif($auth['mahasiswa_id']['status_id']['id'] == 4)
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sudah Sidang Sempro dan Tidak Mengulangi</h5>
        @elseif($auth['mahasiswa_id']['status_id']['id'] == 5)
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sudah Daftar Sidang Akhir</h5>
        @elseif($auth['mahasiswa_id']['status_id']['id'] == 6)
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sudah Sidang dan Mengulangir</h5>
        @elseif($auth['mahasiswa_id']['status_id']['id'] == 7)
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sudah Sidang dan Tidak Mengulangi, Silahkan Upload Form Bebas Tanggungan</h5>
        @elseif($auth['mahasiswa_id']['status_id']['id'] == 8)
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jadwal Pengambilan Ijazah Sudah Diberikan, Selamat...</h5>
        @endif
    </div>

    <div class="bg-gray-50 dark:bg-gray-800 block p-4 sm:p-6 md:p-6 lg:p-6 xl:p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tanggal Sidang:</h5>
        @if($auth['mahasiswa_id']['sidang_id'] == 'Belum Di Jadwalkan')
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['sidang_id'] }}</h5>
        @elseif($auth['mahasiswa_id']['sidang_id'] != 'Belum Di Jadwalkan')
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['sidang_id']['nama_sidang'] }}</h5>
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['sidang_id']['tanggal_sidang'] }}</h5>
        @endif
    </div>

    <div class="bg-gray-50 dark:bg-gray-800 block p-4 sm:p-6 md:p-6 lg:p-6 xl:p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Hasil Sidang Sempro:</h5>
        @if($auth['mahasiswa_id']['hasil_sidang_sempro_id'] == 'Belum Ada Hasil Sidang Sempro')
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['hasil_sidang_sempro_id'] }}</h5>
        @elseif($auth['mahasiswa_id']['hasil_sidang_sempro_id'] != 'Belum Ada Hasil Sidang Sempro')
            <button data-modal-target="hasilSemproMahasiswa{{ $auth['id'] }}" data-modal-toggle="hasilSemproMahasiswa{{ $auth['id'] }}" class="text-white w-full bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-blue-600 dark:hover-bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
                <i class="fas fa-eye fa-lg inline-block p-1 transform hover:scale-105"></i> Lihat
            </button>
            <x-modal.hasilsempro :datamahasiswa="$auth" />
        @endif
    </div>

    <div class="bg-gray-50 dark:bg-gray-800 block p-4 sm:p-6 md:p-6 lg:p-6 xl:p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Hasil Sidang Akhir :</h5>
        @if($auth['mahasiswa_id']['hasil_sidang_akhir_id'] == 'Belum Ada Hasil Sidang Akhir')
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['hasil_sidang_akhir_id'] }}</h5>
        @elseif($auth['mahasiswa_id']['hasil_sidang_akhir_id'] != 'Belum Ada Hasil Sidang Akhir')
            <button data-modal-target="lihathasilSidangAkhir{{ $auth['id'] }}" data-modal-toggle="lihathasilSidangAkhir{{ $auth['id'] }}" class="text-white w-full bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm sm:text-base p-1 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
                <i class="fas fa-eye fa-lg inline-block p-1 transform hover:scale-105"></i> Lihat
            </button>
            <x-modal.lihathasilsidangakhir :datamahasiswa="$auth" />
        @endif
    </div>

    <div class="bg-gray-50 dark:bg-gray-800 block p-4 sm:p-6 md:p-6 lg:p-6 xl:p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Verifikasi Akademik :</h5>
        @if($auth['mahasiswa_id']['verifikasi_id']['verifikasi_akademik'] == 0)
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Belum Verifikasi</h5>
        @elseif($auth['mahasiswa_id']['verifikasi_id']['verifikasi_akademik'] == 1)
            <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sudah Verifikasi</h5>
        @endif
    </div>

    <div class="bg-gray-50 dark:bg-gray-800 block p-4 sm:p-6 md:p-6 lg:p-6 xl:p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Pengambilan Ijazah :</h5>
        <h5 class="mb-2 text-xl sm:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['jadwal_pengambilan_ijazah'] }}</h5>
    </div>
</div>
