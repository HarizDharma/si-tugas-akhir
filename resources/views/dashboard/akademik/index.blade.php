@extends('layout.app')
@section('title', 'Halaman Dashboard Akademik')

@section('main')
{{--  isi props dfengan data user yang dilempar ke halaman ini  --}}
    <x-navbar :nama="$user['nama']"/>
    <x-sidebarakademik/>

@endsection
