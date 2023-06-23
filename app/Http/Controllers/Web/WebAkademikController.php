<?php

namespace App\Http\Controllers\Web;

use App\Repositories\Akademik\AkademikRepository;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Akademik\AkademikRepositoryInterface;
use App\Repositories\Auth\AuthRepositoryInterface;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class WebAkademikController extends Controller
{
    private $akademikRepo;
    public function __construct(AuthRepositoryInterface $akademikRepo)
    {
        $this->akademikRepo = $akademikRepo;
    }

    //index plus pengecekan login
    public function index()
    {
        //get dfata return dari repo
        $auth = $this->akademikRepo->index();

        if ($auth) {
            // Buat alert untuk berhasil login
            session()->flash('success', 'Selamat Datang');

            return view('dashboard.akademik.index')->with($auth);
        } else {
            return view('auth');
        }
    }


    public function profile()
    {
        $auth = $this->akademikRepo->index();

        //pengecekan login / jika login diarahkan ke hal profile
        if ($auth) {
            return view('dashboard.akademik.profile')->with($auth);
        }
        else {
            return view('auth');
        }
    }

}
