@extends('layout.app')
@section('title', 'Halaman Data Konfirmasi Mahasiswa')

@section('main')
    <x-common.navbar :nama="$user['nama']" :role="$user['role']"/>
    <x-sidebar.sidebarpanitia/>
    <x-table.tableverifikasipanitia/>

@endsection
