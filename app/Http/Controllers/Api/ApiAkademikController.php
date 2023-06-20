<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Akademik\CreateAkademikRequest;
use App\Http\Requests\Akademik\UpdateAkademikRequest;
use App\Models\User;
use App\Repositories\Akademik\AkademikRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAkademikController extends Controller
{
    private $akademikRepo;
    public function __construct(AkademikRepositoryInterface $akademikRepo)
    {
        $this->akademikRepo = $akademikRepo;
        $this->middleware('auth:sanctum');
    }

    public function  index() {
        $akademik = $this->akademikRepo->index();
        return response()->json($akademik);
    }
    public function  show($id) {
        $akademik = $this->akademikRepo->show($id);
        return response()->json($akademik);
    }
    public function  store(CreateAkademikRequest $request) {
        $akademik = $this->akademikRepo->store($request);
        return response()->json($akademik);
    }
    public function  update(UpdateAkademikRequest $request, $id) {
        $akademik = $this->akademikRepo->update($request, $id);
        return response()->json($akademik);
    }
    public function  destroy($id) {
        $akademik = $this->akademikRepo->destroy($id);
        return response()->json($akademik);
    }
}
