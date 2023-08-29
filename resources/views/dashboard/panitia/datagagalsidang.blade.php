@extends('layout.app')
@section('title', 'Halaman Data Gagal Sidang Akhir')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarpanitia/>
    <x-table.tablegagalsidangpanitia :mahasiswa="$mahasiswa['data']"/>

@endsection
