{{--isi props yang dilempar dari hal utama datakonfirmasi di view--}}
@props(['datakonfirmasi'])

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14 bg-gray-50">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Data Mahasiswa Sudah Daftar Sempro dan Belum Terverifikasi Panitia
            </caption>

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    No Identitas
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Verifikasi Panitia Sempro
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Aksi
                </th>
            </tr>
            </thead>
            <tbody>
{{--show data disini--}}
            @php
                $counter = 1;
            @endphp
            @foreach ($datakonfirmasi as $datamahasiswa)
            {{--                jika status mahasiswa belum progrss tidak usah ditampikan hanya tampil yang sudah sempro--}}

            @if($datamahasiswa['mahasiswa_id']['status_id']['nama_status'] == 'Sudah Daftar Sempro' AND $datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia_sempro'] == 0)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                <td class="px-6 py-4">
                    {{ $counter++ }}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                    {{ $datamahasiswa['nama'] }}
                </th>
                <td class="px-6 py-4">
                    {{ $datamahasiswa['nomor_identitas'] }}
                </td>
                <td class="px-6 py-4">
                    {{ $datamahasiswa['mahasiswa_id']['status_id']['nama_status'] }}
                </td>
                <td class="px-6 py-4">
                    @if($datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia_sempro'] == null)
                        <span class="inline-block py-1 px-1 text-center text-sm font-semibold text-white bg-red-500 rounded">
                                Belum Verifikasi
                        </span>
                    @elseif($datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia_sempro'] == 1)
                        <span class="inline-block py-1 px-1 text-center text-sm font-semibold text-white bg-green-500 rounded">
                                Sudah Verifikasi
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    {{--tombol detail data mahasiswa--}}
                    <button data-modal-target="detailMahasiswa{{ $datamahasiswa['id'] }}" data-modal-toggle="detailMahasiswa{{ $datamahasiswa['id'] }}" class="text-white w-full bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
                        <i class="fas fa-info-circle fa-lg inline-block p-1 transform hover:scale-105"></i> Detail
                    </button>

                    {{--panggil modal detail mahasiswa component--}}
                    <x-modal.detailmahasiswa :datamahasiswa="$datamahasiswa" />

                    {{--tombol cek file mahasiswa--}}
                    <button data-modal-target="cekFileSempro{{ $datamahasiswa['id'] }}" data-modal-toggle="cekFileSempro{{ $datamahasiswa['id'] }}" class="text-white w-full bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800" type="button">
                        <i class="fas fa-file fa-lg inline-block p-1 transform hover:scale-105"></i> Cek File
                    </button>

                    {{--panggil modal cek file mahasiswa component--}}
                    <x-modal.cekfilesempro :datamahasiswa="$datamahasiswa" />

                    <x-verifikasi.verifikasipanitia :datamahasiswa="$datamahasiswa"/>
                </td>
            </tr>
            @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
{{--data yang belum progress--}}
