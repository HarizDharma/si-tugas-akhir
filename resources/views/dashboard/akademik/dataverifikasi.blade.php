@extends('layout.app')
@section('title', 'Halaman Data Verifikasi Mahasiswa')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarakademik/>
    <x-table.tableverifikasimahasiswa :mahasiswa="$mahasiswa['data']"/>

@endsection
