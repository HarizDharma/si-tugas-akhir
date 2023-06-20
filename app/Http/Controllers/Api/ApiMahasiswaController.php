<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mahasiswa\CreateMahasiswaRequest;
use App\Http\Requests\Mahasiswa\UpdateMahasiswaRequest;
use App\Http\Resources\ResponseResource;
use App\Repositories\Mahasiswa\MahasiswaRepositoryInterface;
use Illuminate\Http\Request;

class ApiMahasiswaController extends Controller
{
     private $mahasiswaRepository;
    public function __construct(MahasiswaRepositoryInterface $mahasiswaRepository)
    {
        $this->mahasiswaRepository = $mahasiswaRepository;
        $this->middleware('auth:sanctum');
    }

    public function  index() {
        $mahasiswa = $this->mahasiswaRepository->index();
        return response()->json($mahasiswa);
    }
    public function  show($id) {
        $mahasiswa = $this->mahasiswaRepository->show($id);
        return response()->json($mahasiswa);
    }
    public function getSelf() {
        $mahasiswa = $this->mahasiswaRepository->getSelf();
        return response()->json($mahasiswa);
    }

    public function store(CreateMahasiswaRequest $request) {
        $mahasiswa = $this->mahasiswaRepository->store($request);
        return response()->json($mahasiswa);

    }
    public function update(UpdateMahasiswaRequest $request, $id) {
        $mahasiswa = $this->mahasiswaRepository->update($request, $id);
        return response()->json($mahasiswa);
    }
    public function updateSelf(UpdateMahasiswaRequest $request) {

        $mahasiswa = $this->mahasiswaRepository->updateSelf($request);
        return response()->json($mahasiswa);
    }

    public function destroy($id) {
        $mahasiswa = $this->mahasiswaRepository->destroy($id);
        return response()->json($mahasiswa);
    }
}
