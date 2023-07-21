@extends('layout.app')
@section('title', 'Halaman Form Bebas Tanggungan Mahasiswa')

@section('main')
    {{--  isi props dfengan data user yang dilempar ke halaman ini  --}}
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarmahasiswa :datamahasiswa="$auth['data']"/>

    {{--    isi content main--}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg mt-14 bg-gray-50">
            <div class="text-3xl font-bold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <h2>Form Bebas Tanggungan Mahasiswa</h2>
            </div>
            <div class="space-y-4 w-1/2" action="" method="POST">
                @csrf
                <div>
                    <label for="toeic" class="block text-md font-medium text-gray-900">Upload Sertifikat TOEIC</label>
                    <input type="file" name="toeic" id="toeic" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="pengumpulan_alat" class="block text-md font-medium text-gray-900">Upload Pengumpulan Alat</label>
                    <input type="file" name="pengumpulan_alat" id="pengumpulan_alat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="skkm" class="block text-md font-medium text-gray-900">Upload SKKM</label>
                    <input type="file" name="skkm" id="skkm" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="laporan_pkl" class="block text-md font-medium text-gray-900">Upload Laporan PKL</label>
                    <input type="file" name="laporan_pkl" id="laporan_pkl" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="px-4 py-2 text-md font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">Submit</button>
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
