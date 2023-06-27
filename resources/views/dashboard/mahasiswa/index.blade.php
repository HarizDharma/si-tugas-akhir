@extends('layout.app')
@section('title', 'Halaman Dashboard Mahasiswa')

@section('main')
    {{--  isi props dfengan data user yang dilempar ke halaman ini  --}}
    <x-common.navbar :nama="$user['nama']"/>
{{--    <x-sidebarmahasiswa/>--}}
    <h1>ini hal mahasiswa</h1>

    {{-- Alert jika login sukses setelah itu login tidak akan muncul lagi menggunakan flash untuk session sementara setelah request otomatis dihapus --}}
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

@endsection
