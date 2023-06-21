@extends('layout.app')
@section('title', 'Halaman Profil User')

@section('main')
    <x-navbar :nama="$user['nama']"/>
    <x-sidebarakademik/>
    <x-profile :data="$user"/>


@endsection
