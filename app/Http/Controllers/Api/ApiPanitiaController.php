<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panitia\CreatePanitiaRequest;
use App\Http\Requests\Panitia\UpdatePanitiaRequest;
use App\Repositories\Panitia\PanitiaRepositoryInterface;
use Illuminate\Http\Request;

class ApiPanitiaController extends Controller
{
  private $panitiaRepo;
    public function __construct(PanitiaRepositoryInterface $panitiaRepo)
    {
        $this->panitiaRepo = $panitiaRepo;
        $this->middleware('auth:sanctum');
    }

    public function  index() {
        $panitia = $this->panitiaRepo->index('api');
        return response()->json($panitia);
    }
    public function  show($id) {
        $panitia = $this->panitiaRepo->show('api', $id);
        return response()->json($panitia);
    }
    public function  store(CreatePanitiaRequest $request) {
        $panitia = $this->panitiaRepo->store('api', $request);
        return response()->json($panitia);
    }
    public function  update(UpdatePanitiaRequest $request, $id) {
        $panitia = $this->panitiaRepo->update('api', $request, $id);
        return response()->json($panitia);
    }
    public function  destroy($id) {
        $panitia = $this->panitiaRepo->destroy('api', $id);
        return response()->json($panitia);
    }


    /// CUSTOM ---
    ///

    public function getSelf() {
        $panitia = $this->panitiaRepo->getSelf();
        return response()->json($panitia);
    }
}
