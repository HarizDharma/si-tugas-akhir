@extends('layout.app')
@section('title', 'Halaman Dashboard')

@section('main')
    <h1>sukses login</h1>
    <h1>Welcome, {{ $user['nama'] }}</h1>
    <br>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

@endsection
