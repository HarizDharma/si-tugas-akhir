@extends('layout.app')
@section('title', 'Halaman Pendaftaran Mahasiswa')

@section('main')
    {{--  isi props dfengan data user yang dilempar ke halaman ini  --}}
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarmahasiswa :datamahasiswa="$auth['data']"/>

    {{--    isi content main--}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg mt-14 bg-gray-50">
            <div class="text-3xl font-bold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <h2>Form Pendaftaran Mahasiswa</h2>
            </div>
            <div class="space-y-4 w-1/2" action="" method="POST">
                @csrf
                <div>
                    <label for="skkm" class="block text-md font-medium text-gray-900">Upload File SKKM</label>
                    <input type="file" name="skkm" id="skkm" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="skla" class="block text-md font-medium text-gray-900">Upload File SKLA</label>
                    <input type="file" name="skla" id="skla" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="kartu_kendali_skripsi" class="block text-md font-medium text-gray-900">Upload Kartu Kendali Skripsi</label>
                    <input type="file" name="kartu_kendali_skripsi" id="kartu_kendali_skripsi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="Draft Artikel Ilmiah" class="block text-md font-medium text-gray-900">Upload Draft Artikel Ilmiah</label>
                    <input type="file" name="draft_artikel_ilmiah" id="draft_artikel_ilmiah" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="surat_keterangan_bebas_pkl" class="block text-md font-medium text-gray-900">Upload Surat Keterangan Bebas PKL</label>
                    <input type="file" name="surat_keterangan_bebas_pkl" id="surat_keterangan_bebas_pkl" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="file_skripsi" class="block text-md font-medium text-gray-900">Upload File Skripsi</label>
                    <input type="file" name="file_skripsi" id="file_skripsi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="px-4 py-2 text-md font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">Submit Pendaftaran</button>
                </div>
            </form>
        </div>
    </div>


    {{-- Alert jika login sukses setelah itu login tidak akan muncul lagi menggunakan flash untuk session sementara setelah request otomatis dihapus --}}
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

@endsection
