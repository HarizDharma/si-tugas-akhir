@props(['datamahasiswalolos'])
<!-- Main modal -->

<div id="aturJadwalSidang" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="aturJadwalSidang">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Atur Ulang Jadwal Sidang <br>Gagal Sidang</h3>
                <div class="space-y-6 text-left">

                    {{--atur ulang jadwal sidang--}}
                    <div>
                        @foreach ($datamahasiswalolos as $datamahasiswa)
                            {{--                jika status mahasiswa sudah verifikasi panitia dan status sudah sempro  ditampikan--}}
                            @if($datamahasiswa['mahasiswa_id']['status_id']['nama_status'] == 'Sudah Sempro' AND $datamahasiswa['mahasiswa_id']['verifikasi_id']['verifikasi_panitia'] != 0)
                                {{$datamahasiswa['id']}}
                            @endif
                        @endforeach
                        <form action="{{route('updateMahasiswaJadwalSidang', ['idMhs' => 1])}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <div class="mt-4">
                                    <label for="jadwal_sidang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Sidang</label>
                                    <select id="jadwal_sidang" name="jadwal_sidang" class="w-full px-3 py-2 text-sm text-gray-900 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                        <option value="" disabled selected>Pilih waktu sidang</option>
                                        <option value="1">Tahap 1 </option>
                                        <option value="2">Tahap 2 </option>
                                        <option value="3">Tahap 3 </option>
                                        <option value="4">Tahap 4 </option>
                                        <!-- Tambahkan pilihan waktu sidang lainnya sesuai kebutuhan Anda -->
                                    </select>
                                </div>
                                <!-- Tambahkan form input lainnya sesuai kebutuhan Anda -->
                                <div class="mt-4">
                                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
