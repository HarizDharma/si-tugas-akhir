@extends('layout.app')
@section('title', 'Halaman Data Akademik')

@section('main')
    <x-common.navbar :nama="$user['nama']" :role="$user['role']"/>
    <x-sidebar.sidebarakademik/>
    <x-table.tableakademik/>

@endsection
