@extends('layout.app')
@section('title', 'Halaman Data Panitia')

@section('main')
    <x-common.navbar :nama="$auth['data']['nama']" :role="$auth['data']['role']"/>
    <x-sidebar.sidebarakademik/>
    <x-table.tablepanitia :panitia="$panitia['data']"/>

    <x-modal.tambahpanitia/>

@endsection
