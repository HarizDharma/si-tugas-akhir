@extends('layout.app')
@section('title', 'Halaman Data Lolos Sidang')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarpanitia/>
    <x-table.tablelolossidang :mahasiswa="$mahasiswa['data']" :auth="$auth['data']"/>

@endsection
