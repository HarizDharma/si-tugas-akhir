<?php

namespace App\Repositories\Verifikasi;

interface VerifikasiRepositoryInterface
{
    public function index($platform = 'api');
    public function show($idUser, $platform = 'api' );

    public function verifikasiPanitia($idUser, $platform = 'api');
    public function verifikasiAkademik($idUser, $platform = 'api');
}
