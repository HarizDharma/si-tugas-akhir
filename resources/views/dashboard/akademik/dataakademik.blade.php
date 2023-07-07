@extends('layout.app')
@section('title', 'Halaman Data Akademik')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarakademik/>
    <x-table.tableakademik :akademik="$akademik['data']"/>

@endsection
