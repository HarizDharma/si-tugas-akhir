<!-- Main modal -->
<div id="cekFile{{ $datamahasiswa['id'] }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="cekFile{{ $datamahasiswa['id'] }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Cek File Form Bebas Tanggungan <br>{{ $datamahasiswa['nama'] }}</h3>
                <div class="space-y-6 text-left text-center">

                    {{--Show data data file laporan pkl--}}
                    <div>
                        <label for="file" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">File Laporan PKL</label>
                        <div class="flex items-center justify-center m-5">
                            <img src="https://icon-library.com/images/files-icon-png/files-icon-png-10.jpg" class="w-20 mx-auto">
                        </div>
                        <a href="#" class="m-5 text-white w-full bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Download</a>
                    </div>

                    {{--Show data data file sertifikat TOEIC--}}
                    <div>
                        <label for="file" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">File Sertifikat TOEIC</label>
                        <div class="flex items-center justify-center m-5">
                            <img src="https://icon-library.com/images/files-icon-png/files-icon-png-10.jpg" class="w-20 mx-auto">
                        </div>
                        <a href="#" class="m-5 text-white w-full bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Download</a>
                    </div>

                    {{--Show data data file SKKM--}}
                    <div>
                        <label for="file" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">File SKKM</label>
                        <div class="flex items-center justify-center m-5">
                            <img src="https://icon-library.com/images/files-icon-png/files-icon-png-10.jpg" class="w-20 mx-auto">
                        </div>
                        <a href="#" class="m-5 text-white w-full bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Download</a>
                    </div>

                    {{--Show data pengumpulan alat--}}
                    <div>
                        <label for="file" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Pengumpulan Alat</label>
                        <div class="flex items-center justify-center m-5">
                            <img src="https://icon-library.com/images/files-icon-png/files-icon-png-10.jpg" class="w-20 mx-auto">
                        </div>
                        <a href="#" class="m-5 text-white w-full bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm p-1 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">Download</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
