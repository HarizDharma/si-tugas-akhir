<?php

namespace App\Http\Controllers\Web;

use App\Repositories\Akademik\AkademikRepository;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class WebAkademikController extends Controller
{
    private $akademikRepo;
    public function __construct(AkademikRepository $akademikRepo)
    {
        $this->akademikRepo = $akademikRepo;
    }

    //index plus pengecekan login
    public function index()
    {
        $auth = $this->akademikRepo->index();
        if ($auth) {
            return view('dashboard.akademik.index')->with($auth);
        }
        else {
            return view('auth');
        }
    }

}
