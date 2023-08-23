@extends('layout.app')
@section('title', 'Halaman Data Mahasiswa Lolos')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarpanitia/>
    <x-table.mahasiswalolos :datamahasiswalolos="$mahasiswa['data']"/>

@endsection
