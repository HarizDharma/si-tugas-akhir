{{--isi props yang dilempar dari hal utama datamahasiswalolos di view--}}
@props(['mahasiswa'])

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14 bg-gray-50">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Data Mahasiswa Sudah Sidang Akhir dan Melakukan Pengambilan Ijazah Oleh Akademik
                <div class="text-left text-sm">
                    <p>Catatan : Disini data mahasiswa yang sudah sidang akhir dan akan di konfirmasi oleh akademik</p>
                </div>

            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-3 py-3">
                    No
                </th>
                <th scope="col" class="px-4 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    No Identitas
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Hasil Sidang Akhir
                </th>
                <th scope="col" class="px-6 py-3">
                    Verifikasi Panitia Sidang Akhir
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
            @foreach ($mahasiswa as $datamahasiswa)
                {{--                jika status mahasiswa sudah verifikasi panitia dan status sudah sempro  ditampikan--}}
                @if($datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia_sidang_akhir'] == 1 AND $datamahasiswa['mahasiswa_id']['status_id']['nama_status'] == "Sudah Sidang dan Tidak Mengulangi")
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
                            {{--tombol detail hasil sidang akhir mahasiswa--}}
                            <button data-modal-target="lihathasilSidangAkhir{{ $datamahasiswa['id'] }}" data-modal-toggle="lihathasilSidangAkhir{{ $datamahasiswa['id'] }}" class="text-white w-full bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
                                <i class="fas fa-eye fa-lg inline-block p-1 transform hover:scale-105"></i> Lihat
                            </button>

                            {{--panggil modal detail sidang akhir mahasiswa component--}}
                            <x-modal.lihathasilsidangakhir :datamahasiswa="$datamahasiswa" />
                        </td>
                        <td class="px-6 py-4">
                            @if($datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia_sidang_akhir'] == null)
                                <span class="inline-block py-1 px-1 text-center text-sm font-semibold text-white bg-red-500 rounded">
                                Belum Verifikasi
                            </span>
                            @elseif($datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia_sidang_akhir'] !== null)
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
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
