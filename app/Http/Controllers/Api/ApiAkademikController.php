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
        $akademik = $this->akademikRepo->index('api');
        return response()->json($akademik);
    }
    public function  show($id) {
        $akademik = $this->akademikRepo->show('api', $id);
        return response()->json($akademik);
    }
    public function  store(CreateAkademikRequest $request) {
        $akademik = $this->akademikRepo->store('api', $request);
        return response()->json($akademik);
    }
    public function  update(UpdateAkademikRequest $request, $id) {
        $akademik = $this->akademikRepo->update('api', $request, $id);
        return response()->json($akademik);
    }
    public function  destroy($id) {
        $akademik = $this->akademikRepo->destroy('api', $id);
        return response()->json($akademik);
    }


    /// CUSTOM ---
    ///

    public function getSelf() {
        $akademik = $this->akademikRepo->getSelf();
        return response()->json($akademik);
    }
}
