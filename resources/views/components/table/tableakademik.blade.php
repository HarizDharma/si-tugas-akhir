{{--isi props yang dilempar dari hal utama dataakademik di view--}}
@props(['akademik', 'login'])

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14 bg-gray-50">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Data Akademik
                    <div class="mt-5">
                        <button data-modal-target="tambahAkademik" data-modal-toggle="tambahAkademik" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Tambah Akademik
                        </button>
                    </div>
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
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Aksi
                    </th>
                </tr>
                </thead>
                <tbody>
{{--                show data disini--}}
                @php
                    $counter = 1;
                @endphp
                @foreach ($akademik as $dataakademik)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $counter++ }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $dataakademik['nama'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $dataakademik['nomor_identitas'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $dataakademik['role'] }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{--tombol detail data akademik--}}
                            <button data-modal-target="detailAkademik{{ $dataakademik['id'] }}" data-modal-toggle="detailAkademik{{ $dataakademik['id'] }}" class="font-medium text-primary-800" type="button">
                                <i class="fas fa-info-circle fa-lg inline-block mr-1 p-3 transform hover:scale-105"></i>
                            </button>

                            {{--panggil modal update akademik component--}}
                            <x-modal.detailakademik :dataakademik="$dataakademik" />

                            {{--pengecekan untuk yang update hanya bisa akunnya sendiri--}}
                            @if($dataakademik['id'] == $login['id'])
                                {{--tombol edit update akademik--}}
                                <button data-modal-target="updateAkademik{{ $dataakademik['id'] }}" data-modal-toggle="updateAkademik{{ $dataakademik['id'] }}" class="font-medium text-yellow-300" type="button">
                                    <i class="fas fa-edit fa-lg inline-block mr-1 p-3 transform hover:scale-105"></i>
                                </button>

                                {{--panggil modal update akademik component--}}
                                <x-modal.updateakademik :dataakademik="$dataakademik" />
                            {{--jika id yang login tidak sama disable button update data--}}
                            @elseif($dataakademik['id'] != $login['id'])
                                <button class="font-medium text-gray-300" type="button">
                                    <i class="fas fa-edit fa-lg inline-block mr-1 p-3 transform hover:scale-105"></i>
                                </button>
                            @endif

                            {{--                            import untuk tombol delete akademik --}}
                            <x-delete.deleteakademik :dataakademik="$dataakademik"/>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</div>

