{{--isi props yang dilempar dari hal utama dataakademik di view--}}
@props(['mahasiswa'])

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14 bg-gray-50">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Jadwal Pengambilan Ijazah Setiap Mahasiswa
            </caption>

            <tbody>
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
                    Jadwal Pengambilan Ijazah
                </th>
                <th scope="col" class="px-6 py-3">
                    Verifikasi Panitia
                </th>
                <th scope="col" class="px-6 py-3">
                    Verifikasi Akademik
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Aksi
                </th>
            </tr>
            {{--             show data disini --}}
            @php
                $counter = 1;
            @endphp
            @foreach ($mahasiswa as $datamahasiswa)
                {{--                jika status mahasiswa belum progrss tidak usah ditampikan--}}
                @if($datamahasiswa['mahasiswa_id']['status_id']['nama_status'] == 'Sudah Sidang dan Tidak Mengulangi' AND $datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia'] != null AND $datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_akademik'] != null AND $datamahasiswa['mahasiswa_id']['jadwal_pengambilan_ijazah'] == 'Belum Di Jadwalkan')
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-3 py-4">
                            {{ $counter++ }}
                        </td>
                        <th scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $datamahasiswa['nama'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $datamahasiswa['nomor_identitas'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $datamahasiswa['mahasiswa_id']['status_id']['nama_status'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $datamahasiswa['mahasiswa_id']['jadwal_pengambilan_ijazah'] }}
                        </td>
                        <td class="px-6 py-4">
                            @if($datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia'] == null)
                                <span class="inline-block py-1 px-1 text-center text-sm font-semibold text-white bg-red-500 rounded">
                                Belum Verifikasi
                            </span>
                            @elseif($datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia'] !== null)
                                <span class="inline-block py-1 px-1 text-center text-sm font-semibold text-white bg-green-500 rounded">
                                Sudah Verifikasi
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_akademik'] == null)
                                <span class="inline-block py-1 px-1 text-center text-sm font-semibold text-white bg-red-500 rounded">
                                Belum Verifikasi
                            </span>
                            @elseif($datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_akademik'] !== null)
                                <span class="inline-block py-1 px-1 text-center text-sm font-semibold text-white bg-green-500 rounded">
                                Sudah Verifikasi
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{--jadwalkan pengambilan ijazah mahasiswa--}}
                            <button data-modal-target="tambahJadwalIjazah{{ $datamahasiswa['id'] }}" data-modal-toggle="tambahJadwalIjazah{{ $datamahasiswa['id'] }}" class="text-white w-full bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
                                <i class="fas fa-book fa-lg inline-block p-1 transform hover:scale-105"></i> Jadwalkan
                            </button>

                            {{--panggil modal detail mahasiswa component--}}
                            <x-modal.tambahjadwalijazah :datamahasiswa="$datamahasiswa" />
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
{{--table untuk yang sudah di set jadwal ambil ijazah--}}
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-3 bg-gray-50">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Sudah Dijadwalkan
            </caption>

            <tbody>
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
                    Jadwal Pengambilan Ijazah
                </th>
                <th scope="col" class="px-6 py-3">
                    Verifikasi Panitia
                </th>
                <th scope="col" class="px-6 py-3">
                    Verifikasi Akademik
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Aksi
                </th>
            </tr>
            {{--             show data disini --}}
            @php
                $counter = 1;
            @endphp
            @foreach ($mahasiswa as $datamahasiswa)
                {{--                jika status mahasiswa belum progrss tidak usah ditampikan--}}
                @if($datamahasiswa['mahasiswa_id']['status_id']['nama_status'] == 'Sudah Sidang dan Tidak Mengulangi' AND $datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia'] != null AND $datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_akademik'] != null AND $datamahasiswa['mahasiswa_id']['jadwal_pengambilan_ijazah'] != 'Belum Di Jadwalkan')
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-3 py-4">
                            {{ $counter++ }}
                        </td>
                        <th scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $datamahasiswa['nama'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $datamahasiswa['nomor_identitas'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $datamahasiswa['mahasiswa_id']['status_id']['nama_status'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $datamahasiswa['mahasiswa_id']['jadwal_pengambilan_ijazah'] }}
                        </td>
                        <td class="px-6 py-4">
                            @if($datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia'] == null)
                                <span class="inline-block py-1 px-1 text-center text-sm font-semibold text-white bg-red-500 rounded">
                                Belum Verifikasi
                            </span>
                            @elseif($datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia'] !== null)
                                <span class="inline-block py-1 px-1 text-center text-sm font-semibold text-white bg-green-500 rounded">
                                Sudah Verifikasi
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_akademik'] == null)
                                <span class="inline-block py-1 px-1 text-center text-sm font-semibold text-white bg-red-500 rounded">
                                Belum Verifikasi
                            </span>
                            @elseif($datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_akademik'] !== null)
                                <span class="inline-block py-1 px-1 text-center text-sm font-semibold text-white bg-green-500 rounded">
                                Sudah Verifikasi
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{--panggil modal delete jadwal ijazah mahasiswa component--}}
                            <x-delete.deletejadwalijazah :datamahasiswa="$datamahasiswa" />
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>

