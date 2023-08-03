@extends('layout.app')
@section('title', 'Jadwal Sidang Mahasiswa')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarpanitia/>

    <x-jadwal.jadwalsidang :jadwal="$jadwal"/>

@endsection
