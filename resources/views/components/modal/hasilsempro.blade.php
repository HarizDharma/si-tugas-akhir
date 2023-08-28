<!-- Main modal -->
<div id="hasilSemproMahasiswa{{ $datamahasiswa['id'] }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="hasilSemproMahasiswa{{ $datamahasiswa['id'] }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Hasil Sidang Sempro Mahasiswa</h3>
                <div class="space-y-6 text-left">
                    @if($datamahasiswa['mahasiswa_id']['hasil_sidang_sempro_id'] != 'Belum Ada Hasil Sidang Sempro')

                    <div>
                        <label for="dosen_penguji1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Dosen penguji 1</label>
                        <input type="text" value="{{$datamahasiswa['mahasiswa_id']['hasil_sidang_sempro_id']['dosen_penguji1']}}" name="dosen_penguji1" id="dosen_penguji1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" readonly>
                    </div>
                    <div>
                        <label for="dosen_penguji2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Dosen penguji 2</label>
                        <input type="text" value="{{$datamahasiswa['mahasiswa_id']['hasil_sidang_sempro_id']['dosen_penguji2']}}" name="dosen_penguji2" id="dosen_penguji2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" readonly>
                    </div>
                    <div>
                        <label for="dosen_penguji3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Dosen penguji 3</label>
                        <input type="text" value="{{$datamahasiswa['mahasiswa_id']['hasil_sidang_sempro_id']['dosen_penguji3']}}" name="dosen_penguji3" id="dosen_penguji3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" readonly>
                    </div>

                    <div>
                        <div>
                            <label for="hasil_sidang_penguji1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hasil Sidang Penguji 1</label>
                            <textarea name="hasil_sidang_penguji1" id="hasil_sidang_penguji1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" readonly>{{$datamahasiswa['mahasiswa_id']['hasil_sidang_sempro_id']['hasil_sidang_penguji1']}}</textarea>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="hasil_sidang_penguji2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hasil Sidang Penguji 2</label>
                            <textarea name="hasil_sidang_penguji2" id="hasil_sidang_penguji2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" readonly>{{$datamahasiswa['mahasiswa_id']['hasil_sidang_sempro_id']['hasil_sidang_penguji2']}}</textarea>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label for="hasil_sidang_penguji3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hasil Sidang Penguji 3</label>
                            <textarea name="hasil_sidang_penguji3" id="hasil_sidang_penguji3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" readonly>{{$datamahasiswa['mahasiswa_id']['hasil_sidang_sempro_id']['hasil_sidang_penguji3']}}</textarea>
                        </div>
                    </div>

{{--                        jika belum ada hasil sidang sempro maka outputnya berikut ini--}}
                    @elseif($datamahasiswa['mahasiswa_id']['hasil_sidang_sempro_id'] == 'Belum Ada Hasil Sidang Sempro')
                        <div>
                            <div>
                                Belum Ada Hasil Sidang Sempro
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
