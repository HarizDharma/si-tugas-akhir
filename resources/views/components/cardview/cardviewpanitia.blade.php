@props(['data'])
{{--    'total_mahasiswa' => $mahasiswa,--}}
{{--    'total_panitia' => $panitia,--}}

{{--    'mahasiswa_verif_panitia_sempro' => $mahasiswaSudahVerifSemproPanitia,--}}
{{--    'mahasiswa_verif_panitia_sidang_akhir' => $mahasiswaSudahVerifSidangAkhirPanitia,--}}

{{--    'mahasiswa_belum_verif_panitia_sempro' => $mahasiswaBelumVerifSemproPanitia,--}}
{{--    'mahasiswa_belum_verif_panitia_sidang_akhir' => $mahasiswaBelumVerifSidangAkhirPanitia,--}}

{{--    'mahasiswa_belum_progress' => $mahasiswaBelumProgress,--}}
{{--    'mahasiswa_belum_sempro' =>$mahasiswaBelumSempro,--}}
{{--    'mahasiswa_lulus_sempro' => $mahasiswaLulusSempro,--}}
{{--    'mahasiswa_sidang_ulang' => $mahasiswaSudahSidang_Ulang,--}}
{{--    'mahasiswa_sidang_lulus' => $mahasiswaSudahSidang_Done,--}}

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 mb-4">
    <div class="bg-gray-50 dark:bg-gray-800 block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Total Mahasiswa:</h5>
        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data['total_mahasiswa'] }}</h5>
    </div>

    <div class="bg-gray-50 dark:bg-gray-800 block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Total Panitia:</h5>
        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data['total_panitia'] }}</h5>
    </div>


{{--    <div class="bg-gray-50 dark:bg-gray-800 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">--}}
{{--        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Mahasiswa Lolos Daftar : </h5>--}}
{{--        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data['mahasiswa_belum_sempro'] }}</h5>--}}
{{--    </div>--}}

{{--    <div class="bg-gray-50 dark:bg-gray-800 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">--}}
{{--        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Belum Verifikasi : </h5>--}}
{{--        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data['mahasiswa_belum_verif_panitia']  }}</h5>--}}
{{--    </div>--}}
</div>
