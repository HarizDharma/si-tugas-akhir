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

class WebPanitiaController extends Controller
{
    private $panitiaRepo;
    private $mahasiswaRepo;
    private $authRepo;
    public function __construct(AuthRepositoryInterface $authRepo, AkademikRepositoryInterface $panitiaRepo, MahasiswaRepositoryInterface $mahasiswaRepo)
    {
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
            return view('dashboard.panitia.index')->with($auth);
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa
    public function datamahasiswa()
    {
        $auth = $this->authRepo->index('web');
        //ambil datamahasiswa get all dari repository
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the datamahasiswa and pass the data using compact()
            return view('dashboard.panitia.datamahasiswa', compact('auth', 'mahasiswa'));
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa yang belum verifikasi panitia
    public function konfirmasipanitia()
    {
        $auth = $this->authRepo->index('web');
        //ambil dataakademik get all dari repository
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the panitia data mahasiswa yang belum verifikasi and pass the data using compact()
            return view('dashboard.panitia.datakonfirmasi', compact('auth', 'mahasiswa'));
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa yang sudah verifikasi panitia
    public function mahasiswalolos()
    {
        $auth = $this->authRepo->index('web');
        //ambil datamahasiswa dari repository
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the panitia data mahasiswa yang belum verifikasi and pass the data using compact()
            return view('dashboard.panitia.datalolos', compact('auth', 'mahasiswa'));
        } else {
            return view('auth');
        }
    }

    //get halaman untuk set jadwal sidang
    public function jadwalsidang()
    {
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the panitia data mahasiswa yang belum verifikasi and pass the data using compact()
            return view('dashboard.panitia.jadwalsidang', compact('auth'));
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa untuk halaman data gagal sidang mahasiswa
    public function gagalsidang()
    {
        $auth = $this->authRepo->index('web');
        //ambil datamahasiswa get all dari repository
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status login true
        if ($auth['status']) {
            // Redirect to the datagagalsidang and pass the data using compact()
            return view('dashboard.panitia.datagagalsidang', compact('auth', 'mahasiswa'));
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
