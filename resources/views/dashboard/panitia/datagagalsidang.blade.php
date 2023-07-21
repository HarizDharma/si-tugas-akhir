@extends('layout.app')
@section('title', 'Halaman Data Gagal Sidang')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarpanitia/>
    <x-table.tablegagalsidangpanitia :mahasiswa="$mahasiswa['data']"/>

{{--    tambahkan modal untuk atur ulang sidang--}}
    <x-modal.aturulangsidang/>
@endsection
