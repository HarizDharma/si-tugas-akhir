@extends('layout.app')
@section('title', 'Halaman Pendaftaran Mahasiswa')

@section('main')
    {{--  isi props dfengan data user yang dilempar ke halaman ini  --}}
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']" :datamahasiswa="$auth['data']"/>
    <x-sidebar.sidebarmahasiswa :datamahasiswa="$auth['data']"/>

    {{--    isi content main--}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg mt-14 bg-gray-50">
            <div class="text-3xl font-bold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <h2>Form Pendaftaran Mahasiswa</h2>
            </div>

            <form class="space-y-4 w-1/2" action="{{ route('uploadFile', ['id' => $auth['data']['id']]) }}" method="POST" enctype="multipart/form-data">
                @csrf


                @method('PUT')

                <div>
                    <label for="skkm" class="block text-md font-medium text-gray-900">Upload File SKKM</label>
                    <input type="file" name="file_skkm" id="skkm" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" >

                    @if(isset($upload->skkm))
                        <x-alert.alert type="success">
                            Sudah Upload File -
                            <a href="/storage/uploads/mahasiswa/{{ $upload->skkm }}" >
                                <x-button.button type="primary"> Download File</x-button.button>
                            </a>
                        </x-alert.alert>
                    @else
                        <x-alert.alert type="danger">
                            Belum Upload File
                        </x-alert.alert>
                    @endif

                </div>

                <div>
                    <label for="skla" class="block text-md font-medium text-gray-900">Upload File SKLA</label>
                    <input type="file" name="file_skla" id="skla" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" >

                    @if(isset($upload->skla))
                        <x-alert.alert type="success">
                            Sudah Upload File -
                            <a href="/storage/uploads/mahasiswa/{{ $upload->skla }}" >
                                <x-button.button type="primary"> Download File</x-button.button>
                            </a>
                        </x-alert.alert>
                    @else
                        <x-alert.alert type="danger">
                            Belum Upload File
                        </x-alert.alert>
                    @endif
                </div>

                <div>
                    <label for="kartu_kendali_skripsi" class="block text-md font-medium text-gray-900">Upload Kartu Kendali Skripsi</label>
                    <input type="file" name="file_kartu_kendali_skripsi" id="kartu_kendali_skripsi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" >


                    @if(isset($upload->kartu_kendali_skripsi))
                        <x-alert.alert type="success">
                            Sudah Upload File -
                            <a href="/storage/uploads/mahasiswa/{{ $upload->kartu_kendali_skripsi }}" >
                                <x-button.button type="primary"> Download File</x-button.button>
                            </a>
                        </x-alert.alert>
                    @else
                        <x-alert.alert type="danger">
                            Belum Upload File
                        </x-alert.alert>
                    @endif
                </div>

                <div>
                    <label for="Draft Artikel Ilmiah" class="block text-md font-medium text-gray-900">Upload Draft Artikel Ilmiah</label>
                    <input type="file" name="file_draft_artikel_ilmiah" id="draft_artikel_ilmiah" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" >

                    @if(isset($upload->bukti_jurnal))
                        <x-alert.alert type="success">
                            Sudah Upload File -
                            <a href="/storage/uploads/mahasiswa/{{ $upload->bukti_jurnal }}" >
                                <x-button.button type="primary"> Download File</x-button.button>
                            </a>
                        </x-alert.alert>
                    @else
                        <x-alert.alert type="danger">
                            Belum Upload File
                        </x-alert.alert>
                    @endif
                </div>

                <div>
                    <label for="surat_keterangan_bebas_pkl" class="block text-md font-medium text-gray-900">Upload Surat Keterangan Bebas PKL</label>
                    <input type="file" name="file_surat_keterangan_bebas_pkl" id="surat_keterangan_bebas_pkl" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" >

                    @if(isset($upload->bebas_pkl))
                        <x-alert.alert type="success">
                            Sudah Upload File -
                            <a href="/storage/uploads/mahasiswa/{{ $upload->bebas_pkl }}" >
                                <x-button.button type="primary"> Download File</x-button.button>
                            </a>
                        </x-alert.alert>
                    @else
                        <x-alert.alert type="danger">
                            Belum Upload File
                        </x-alert.alert>
                    @endif
                </div>

                <div>
                    <label for="file_skripsi" class="block text-md font-medium text-gray-900">Upload File Skripsi</label>
                    <input type="file" name="file_skripsi" id="file_skripsi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" >

                    @if(isset($upload->laporan_skripsi))
                        <x-alert.alert type="success">
                            Sudah Upload File -
                            <a href="/storage/uploads/mahasiswa/{{ $upload->laporan_skripsi }}" >
                                <x-button.button type="primary"> Download File</x-button.button>
                            </a>
                        </x-alert.alert>
                    @else
                        <x-alert.alert type="danger">
                            Belum Upload File
                        </x-alert.alert>
                    @endif
                </div>
                <button type="submit" class="px-4 py-2 text-md font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">Submit Pendaftaran</button>

                <div class="flex items-center justify-between">
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
