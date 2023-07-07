@extends('layout.app')
@section('title', 'Halaman Dashboard Panitia')

@section('main')
    {{--  isi props dfengan data user yang dilempar ke halaman ini  --}}
    <x-common.navbar :nama="$user['nama']" :role="$user['role']"/>
    <x-sidebar.sidebarpanitia/>

    {{--    isi content main--}}
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg dark:border-gray-700 mt-14">
            <x-cardview.cardviewpanitia/>
        </div>
    </div>

    <script src="http://127.0.0.1:8000/vendor/sweetalert/sweetalert.all.js"></script>
    <script>

        Swal.fire({"title":"Berhasil","text":"Berhasil Logout !","timer":5000,"background":"#fff","width":"32rem","heightAuto":true,"padding":"1.25rem","showConfirmButton":true,"showCloseButton":false,"timerProgressBar":false,"customClass":{"container":null,"popup":null,"header":null,"title":null,"closeButton":null,"icon":null,"image":null,"content":null,"input":null,"actions":null,"confirmButton":null,"cancelButton":null,"footer":null},"icon":"success"});
    </script>
    {{-- Alert jika login sukses setelah itu login tidak akan muncul lagi menggunakan flash untuk session sementara setelah request otomatis dihapus --}}
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
@endsection
