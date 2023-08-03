<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Akademik\AkademikRepositoryInterface;
use App\Repositories\Verifikasi\VerifikasiRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Akademik\CreateAkademikRequest;
use App\Http\Requests\Akademik\UpdateAkademikRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ApiVerifikasiController extends Controller
{
    private $verifikasiRepo;
    public function __construct(VerifikasiRepositoryInterface $verifikasiRepo)
    {

        $this->verifikasiRepo = $verifikasiRepo;
        $this->middleware('auth:sanctum');
    }

    public function index() {
        $verifikasi = $this->verifikasiRepo->index('api');
        return response()->json($verifikasi);
    }
    public function show($idUser) {
        $verifikasi = $this->verifikasiRepo->show($idUser,'api');
        return response()->json($verifikasi);
    }
}

