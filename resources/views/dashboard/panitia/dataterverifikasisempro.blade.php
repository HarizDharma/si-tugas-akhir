@extends('layout.app')
@section('title', 'Halaman Data Terverifikasi Sempro')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarpanitia/>
    <x-table.tableterverifikasisempro :dataterverifikasisempro="$mahasiswa['data']"/>

@endsection
