@extends('layout.app')
@section('title', 'Halaman Dashboard Akademik')

@section('main')
{{--  isi props dfengan data user yang dilempar ke halaman ini--}}
{{--    <x-navbar :nama="$user['nama']" :role="$user['role']"/>--}}
{{--    <x-sidebarakademik/>--}}

<pre>
{{--      Cek Response--}}
    {{ htmlspecialchars_decode(json_encode($user)) }}

{{--      Tes Response--}}
    {{ $user['role'] }}
    {{ $user['mahasiswa_id']['status_id']['nama_status'] }}
</pre>

@endsection
