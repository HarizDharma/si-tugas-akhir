@extends('layout.app')
@section('title', 'Halaman Data Sudah Sidang Akhir')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarpanitia/>
    <x-table.tablesudahsidangakhir :mahasiswa="$mahasiswa['data']" :auth="$auth['data']"/>

@endsection
