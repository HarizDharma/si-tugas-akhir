@extends('layout.app')
@section('title', 'Halaman Data Lolos Sidang')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarakademik/>
    <x-table.tablelolossidang :mahasiswa="$mahasiswa['data']"/>

@endsection
