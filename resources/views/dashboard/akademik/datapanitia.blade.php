@extends('layout.app')
@section('title', 'Halaman Data Panitia')

@section('main')
{{--    <x-common.navbar :nama="$auth['nama']" :role="$auth['role']"/>--}}
    <x-sidebar.sidebarakademik/>
    <x-table.tablepanitia :panitia="$panitia['data']"/>

    <x-modal.tambahakademik/>

@endsection
