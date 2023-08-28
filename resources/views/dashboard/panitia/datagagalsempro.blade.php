@extends('layout.app')
@section('title', 'Halaman Data Gagal Sidang Sempro')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarpanitia/>
    <x-table.tablegagalsidangsempro :mahasiswa="$mahasiswa['data']"/>

@endsection
