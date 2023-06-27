@extends('layout.app')
@section('title', 'Halaman Data Mahasiswa Lolos')

@section('main')
    <x-common.navbar :nama="$user['nama']" :role="$user['role']"/>
    <x-sidebar.sidebarpanitia/>
    <x-table.mahasiswalolos/>

@endsection
