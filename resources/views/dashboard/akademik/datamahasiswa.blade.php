@extends('layout.app')
@section('title', 'Halaman Data Mahasiswa')

@section('main')
    <x-common.navbar :nama="$user['nama']" :role="$user['role']"/>
    <x-sidebar.sidebarakademik/>
    <x-table.tablemahasiswa/>
    <x-modal.tambahmahasiswa/>

@endsection

<!-- Script untuk inisialisasi modal -->
{{--<script>--}}
{{--    function modal() {--}}
{{--        return {--}}
{{--            isModalOpen: false, // Menentukan apakah modal ditampilkan atau disembunyikan--}}
{{--            closeModal() {--}}
{{--                this.isModalOpen = false;--}}
{{--            }--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
