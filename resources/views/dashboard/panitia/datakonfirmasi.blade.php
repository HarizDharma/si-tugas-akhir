@extends('layout.app')
@section('title', 'Halaman Data Konfirmasi Mahasiswa')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarpanitia/>
    <x-table.tableverifikasipanitia :datakonfirmasi="$mahasiswa['data']"/>

@endsection
