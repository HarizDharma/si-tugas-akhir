@extends('layout.app')
@section('title', 'Halaman Data Mahasiswa')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarpanitia/>
    <x-table.tablemahasiswapanitia :mahasiswa="$mahasiswa['data']"/>
@endsection
