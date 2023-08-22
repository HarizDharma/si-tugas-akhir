@props(['auth'])

<div class="grid grid-cols-3 gap-4 mb-4">
    <div class="bg-gray-50 dark:bg-gray-800 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Status : </h5>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['status_id']['nama_status'] }}</h5>
    </div>

    <div class="bg-gray-50 dark:bg-gray-800 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Informasi : </h5>
{{--            pengecekan setiap status untuk informasi yang berbeda dari setiap status--}}
            @if($auth['mahasiswa_id']['status_id']['id'] == 1)
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Silahkan Melakukan Pendaftaran</h5>
            @elseif($auth['mahasiswa_id']['status_id']['id'] == 2)
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Silahkan Tunggu Konfirmasi Panitia</h5>
            @elseif($auth['mahasiswa_id']['status_id']['id'] == 3)
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Selamat, Anda Lolos Sempro</h5>
            @elseif($auth['mahasiswa_id']['status_id']['id'] == 4)
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sidang Anda Mengulangi</h5>
            @elseif($auth['mahasiswa_id']['status_id']['id'] == 5)
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sudah Sidang dan Lolos Sidang</h5>
            @endif

    </div>

    <div class="bg-gray-50 dark:bg-gray-800 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tanggal Sidang : </h5>
{{--        pengecekan apakah jadwal sidang sudah ditentukan atau belum--}}
        @if($auth['mahasiswa_id']['sidang_id'] == 'Belum Di Jadwalkan')
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['sidang_id'] }}</h5>
        @elseif($auth['mahasiswa_id']['sidang_id'] != 'Belum Di Jadwalkan')
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['sidang_id']['nama_sidang'] }}</h5>
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['sidang_id']['tanggal_sidang'] }}</h5>
        @endif

    </div>

    <div class="bg-gray-50 dark:bg-gray-800 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Hasil Sidang : </h5>
{{--        pengecekan untuk jika ada hasil sidang tampilkan hasil jika tidak tampilkan null--}}
        @if($auth['mahasiswa_id']['hasil_sidang_id'] == 'Belum Ada Hasil Sidang')
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['hasil_sidang_id'] }}</h5>
        @elseif($auth['mahasiswa_id']['hasil_sidang_id'] != 'Belum Ada Hasil Sidang')
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['hasil_sidang_id']['hasil_sidang'] }}</h5>
        @endif
    </div>

    <div class="bg-gray-50 dark:bg-gray-800 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Verifikasi Panitia : </h5>
        {{--        pengecekan untuk verifikasi panitia--}}
        @if($auth['mahasiswa_id']['verifikasi_id']['verifikasi_panitia'] == 0)
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900  dark:text-white">Belum Verifikasi</h5>
        @elseif($auth['mahasiswa_id']['verifikasi_id']['verifikasi_panitia'] == 1)
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sudah Verifikasi</h5>
        @endif
    </div>

    <div class="bg-gray-50 dark:bg-gray-800 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Verifikasi Akademik  : </h5>
        {{--        pengecekan untuk verifikasi akademik--}}
        @if($auth['mahasiswa_id']['verifikasi_id']['verifikasi_akademik'] == 0)
            <h5 class="mb-2 text-2xl font-bold  text-gray-900">Belum Verifikasi</h5>
        @elseif($auth['mahasiswa_id']['verifikasi_id']['verifikasi_akademik'] == 1)
            <h5 class="mb-2 text-2xl font-bold  text-gray-900">Sudah Verifikasi</h5>
        @endif
    </div>

    <div class="bg-gray-50 dark:bg-gray-800 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Pengambilan Ijazah : </h5>
        {{-- untuk jadwal pengambilan ijazah by akademik--}}
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $auth['mahasiswa_id']['jadwal_pengambilan_ijazah'] }}</h5>
    </div>
</div>
