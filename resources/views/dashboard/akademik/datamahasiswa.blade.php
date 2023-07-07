@extends('layout.app')
@section('title', 'Halaman Data Mahasiswa')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarakademik/>
    <x-table.tablemahasiswa :mahasiswa="$mahasiswa['data']"/>
    <x-modal.tambahmahasiswa/>

@endsection
