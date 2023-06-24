@extends('layout.app')
@section('title', 'Halaman Dashboard Panitia')

@section('main')
    {{--  isi props dfengan data user yang dilempar ke halaman ini  --}}
    <x-common.navbar :nama="$user['nama']"/>
{{--    <x-sidebarpanitia/>--}}
@endsection
