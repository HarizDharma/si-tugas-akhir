@extends('layout.app')
@section('title', 'Halaman Dashboard Panitia')

@section('main')
    {{--  isi props dfengan data user yang dilempar ke halaman ini  --}}
    <x-navbar :nama="$user['nama']"/>
{{--    <x-sidebarpanitia/>--}}
    <h1>ini hal panitia</h1>
@endsection
