{{--isi props yang dilempar dari hal utama datakonfirmasi di view--}}
@props(['dataterverifikasisempro'])

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14 bg-gray-50">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Data Mahasiswa Yang Sudah Terverifikasi Sempro dan Melakukan Sidang Sempro
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
                    Hasil Sidang Sempro
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
            @foreach ($dataterverifikasisempro as $datamahasiswa)
                {{--                jika status mahasiswa sudah daftar dan terverifikasi panitia sempro ditampikan--}}
                @if($datamahasiswa['mahasiswa_id']['status_id']['nama_status'] == 'Sudah Daftar Sempro' AND $datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia_sempro'] == 1)
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
                            {{--tombol detail hasil sidang sempro mahasiswa--}}
                            <button data-modal-target="hasilSemproMahasiswa{{ $datamahasiswa['id'] }}" data-modal-toggle="hasilSemproMahasiswa{{ $datamahasiswa['id'] }}" class="text-white w-full bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
                                <i class="fas fa-eye fa-lg inline-block p-1 transform hover:scale-105"></i> Lihat
                            </button>

                            {{--panggil modal detail mahasiswa component--}}
                            <x-modal.hasilsempro :datamahasiswa="$datamahasiswa" />
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block py-1 px-1 text-center text-sm font-semibold text-white bg-green-500 rounded">
                                Sudah Verifikasi
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            {{--tombol detail data mahasiswa--}}
                            <button data-modal-target="detailMahasiswa{{ $datamahasiswa['id'] }}" data-modal-toggle="detailMahasiswa{{ $datamahasiswa['id'] }}" class="text-white w-full bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
                                <i class="fas fa-info-circle fa-lg inline-block p-1 transform hover:scale-105"></i> Detail
                            </button>

                            {{--panggil modal detail mahasiswa component--}}
                            <x-modal.detailmahasiswa :datamahasiswa="$datamahasiswa" />

                            <button data-modal-target="aturJadwalSidang{{ $datamahasiswa['id'] }}" data-modal-toggle="aturJadwalSidang{{ $datamahasiswa['id'] }}" class="text-white w-full bg-gray-500 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-bray-600 dark:hover:bg-bray-700 focus:outline-none dark:focus:ring-bray-800" type="button">
                                <i class="fas fa-edit fa-lg inline-block p-1 transform hover:scale-105"></i> Atur Jadwal Sidang
                            </button>

                            <x-modal.aturjadwalsidang :datamahasiswa="$datamahasiswa"/>

{{--                            jika hasil sidang sudah di set maka tidak muncul tombol ini--}}
                            @if($datamahasiswa['mahasiswa_id']['hasil_sidang_sempro_id'] == 'Belum Ada Hasil Sidang Sempro')
                            {{--tombol untuk ganti status dan set hasil sidang data mahasiswa--}}
                            <button type="button" data-modal-target="hasilSidangMahasiswa{{ $datamahasiswa['id'] }}" data-modal-toggle="hasilSidangMahasiswa{{ $datamahasiswa['id'] }}" class="text-white w-full bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                                <i class="fas fa-check fa-lg inline-block p-1 transform hover:scale-105"></i> Hasil Sidang Sempro
                            </button>

                            {{--panggil modal untuk hasil sidang mahasiswa component--}}
                            <x-modal.hasilsidangsempro :datamahasiswa="$datamahasiswa" />
                            @endif
                            <button type="button" data-modal-target="editStatusMahasiswa{{ $datamahasiswa['id'] }}" data-modal-toggle="editStatusMahasiswa{{ $datamahasiswa['id'] }}" class="text-white w-full bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">
                                <i class="fas fa-edit fa-lg inline-block p-1 transform hover:scale-105"></i> Edit Status
                            </button>

                            {{--panggil modal untuk edit status mahasiswa component--}}
                            <x-modal.editstatusmahasiswa :datamahasiswa="$datamahasiswa" />
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
