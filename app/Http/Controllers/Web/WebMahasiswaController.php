<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Auth\AuthRepositoryInterface;
use App\Repositories\Mahasiswa\MahasiswaRepositoryInterface;
use App\Repositories\Panitia\PanitiaRepositoryInterface;
use App\Repositories\Akademik\AkademikRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class WebMahasiswaController extends Controller
{
    //deklarasi untuk menmpung repository mahasiswa,panitia dan akademik
    private $akademikRepo;
    private $panitiaRepo;
    private $authRepo;
    private $mahasiswaRepo;
    public function __construct(AkademikRepositoryInterface $akademikRepo, PanitiaRepositoryInterface $panitiaRepo, MahasiswaRepositoryInterface $mahasiswaRepo, AuthRepositoryInterface $authRepo)
    {
        //manggil repo lalu dimasukkan ke var private diatas
        $this->akademikRepo = $akademikRepo;
        $this->panitiaRepo = $panitiaRepo;
        $this->mahasiswaRepo = $mahasiswaRepo;
        $this->authRepo = $authRepo;
    }

    //index plus pengecekan login
    public function index()
    {
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the academic dashboard
            return view('dashboard.mahasiswa.index', compact('auth'));
        } else {
            return view('auth');
        }
    }

    //getall halama pendaftaran
    public function pendaftaranmahasiswa()
    {
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the academic dashboard and pass the data using compact()
            return view('dashboard.mahasiswa.pendaftaranmahasiswa', compact('auth'));
        } else {
            return view('auth');
        }
    }

    //getall halama form bebas tanggungan
    public function bebastanggungan()
    {
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the academic dashboard and pass the data using compact()
            return view('dashboard.mahasiswa.formbebastanggungan', compact('auth'));
        } else {
            return view('auth');
        }
    }

    protected function generateSanctumToken($user)
    {
        $token = $user->createToken('api-token')->plainTextToken;
        return $token;
    }

}
