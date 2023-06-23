@extends('layout.app')
@section('title', 'Halaman Dashboard Akademik')

@section('main')
{{--  isi props dfengan data user yang dilempar ke halaman ini  --}}
    <x-navbar :nama="$user['nama']" :role="$user['role']"/>
    <x-sidebarakademik/>

    {{--    Alert jika login sukses setelah itu login tidak akan muncul lagi--}}
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


@endsection
