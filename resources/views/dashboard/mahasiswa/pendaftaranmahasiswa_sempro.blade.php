


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

            <form class="space-y-4 w-1/2" action="{{ route('uploadFile_Sempro', ['id' => $auth['data']['id']]) }}" method="POST" enctype="multipart/form-data">
                @csrf


                @method('PUT')

                <div>
                    <label for="skkm" class="block text-md font-medium text-gray-900">Upload File Proposal Seminar</label>
                    <input type="file" name="proposal_laporan_sempro" id="proposal_laporan_sempro" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" >

                    @if(isset($upload->proposal_laporan_sempro))
                        <x-alert.alert type="success">
                            Sudah Upload File -
                            <a href="/storage/uploads/mahasiswa/{{ $upload->proposal_laporan_sempro }}" >
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
                    <label for="skla" class="block text-md font-medium text-gray-900">Upload File Formulir Prsetujuan Seminar Proposal</label>
                    <input type="file" name="form_perstujuan_sempro" id="form_perstujuan_sempro" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" >

                    @if(isset($upload->form_perstujuan_sempro))
                        <x-alert.alert type="success">
                            Sudah Upload File -
                            <a href="/storage/uploads/mahasiswa/{{ $upload->form_perstujuan_sempro }}" >
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
