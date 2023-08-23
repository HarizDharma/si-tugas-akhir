@extends('layout.app')
@section('title', 'Halaman Data Gagal Sidang')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarpanitia/>
    <x-table.tablegagalsidang :mahasiswa="$mahasiswa['data']"/>

@endsection
