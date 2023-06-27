<?php

namespace App\Repositories\Panitia;

use App\Http\Requests\Panitia\CreatePanitiaRequest;
use App\Http\Requests\Panitia\UpdatePanitiaRequest;

class PanitiaRepository implements PanitiaRepositoryInterface
{
    public function index()
    {
        // TODO: buat return untuk data yang belum diverifikasi artinya status masih proses konfirmasi panitia

    }
    public function show($id)
    {
        // TODO: buat return data mahasiswa by id mahasiswa return keseluruhan mencakup file yang ditampilkan untuk panitia
    }
    public function store(CreatePanitiaRequest $request)
    {
        // TODO: disini tidak ada store hanya update untuk merubah status
    }
    public function update(UpdatePanitiaRequest $request, $id)
    {
        // TODO: update data jika mahasiswa terkonfirmasi dan berkasnya sudah di cek
    }
    public function updateSelf()
    {
        // TODO: Implement updateSelf() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    //TODO: buat counting mahasiswa yang belum terverifikasi
    //TODO: buat counting mahasiswa yang sudah lolos verifikasi sempro
    //TODO: buat counting data panitia
}
