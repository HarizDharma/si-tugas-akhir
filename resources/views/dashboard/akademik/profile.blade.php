@extends('layout.app')
@section('title', 'Halaman Profil User')

@section('main')
    <x-navbar :nama="$user['nama']" :role="$user['role']"/>
    <x-sidebarakademik/>
    <x-profileakademik :data="$user"/>


@endsection
