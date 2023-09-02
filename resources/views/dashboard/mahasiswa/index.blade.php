@extends('layout.app')
@section('title', 'Halaman Dashboard Mahasiswa')

@section('main')
    {{--  isi props dfengan data user yang dilempar ke halaman ini  --}}
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']" :datamahasiswa="$auth['data']"/>
    <x-sidebar.sidebarmahasiswa :datamahasiswa="$auth['data']"/>

    {{--    isi content main--}}
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg dark:border-gray-700 mt-14">
            <x-cardview.cardviewmahasiswa :auth="$auth['data']"/>
        </div>
    </div>

    {{-- Alert jika login sukses setelah itu login tidak akan muncul lagi menggunakan flash untuk session sementara setelah request otomatis dihapus --}}
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

@endsection
