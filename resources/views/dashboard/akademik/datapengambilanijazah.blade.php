@extends('layout.app')
@section('title', 'Halaman Jadwal Ijazah Mahasiswa')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarakademik/>
    <x-table.tablejadwalijazah :mahasiswa="$mahasiswa['data']"/>

@endsection
