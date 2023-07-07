<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Akademik\AkademikRepositoryInterface;
use App\Repositories\Auth\AuthRepositoryInterface;
use App\Repositories\Mahasiswa\MahasiswaRepositoryInterface;
//use App\Repositories\Panitia\PanitiaRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WebAkademikController extends Controller
{
    //deklarasi untuk menmpung repository mahasiswa,panitia dan akademik
    private $akademikRepo;
    private $panitiaRepo;
    private $authRepo;
    private $mahasiswaRepo;

    public function __construct(AkademikRepositoryInterface $akademikRepo, MahasiswaRepositoryInterface $mahasiswaRepo, AuthRepositoryInterface $authRepo)
    {
        //manggil repo lalu dimasukkan ke var private diatas
        $this->akademikRepo = $akademikRepo;
//        $this->panitiaRepo = $panitiaRepo;
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
            return view('dashboard.akademik.index')->with($auth);
        } else {
            return view('auth');
        }
    }


    public function dataakademik()
    {
        $auth = $this->authRepo->index('web');
        //ambil dataakademik get all dari repository
        $akademik = $this->akademikRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the academic dashboard and pass the data using compact()
            return view('dashboard.akademik.dataakademik', compact('auth', 'akademik'));
        } else {
            return view('auth');
        }
    }

    public function datapanitia()
    {
        //cek sudah login apa belum
        if (Auth::check()){
            //jika sudah login eksekusi
            //get dfata return dari repo
            // Auth berhasil
            $user = Auth::user();

            //dapatkan user dengan role akademik
            $akademik = $this->akademikRepo->index();

            // Generate token JWT
            $token = $this->generateSanctumToken($user);
            $user->token = $token;

            //pengecekan login / jika login diarahkan ke hal profile
            if ($akademik && $user) {
                //ke halaman daftar data panitia
                return view('dashboard.akademik.datapanitia')->with([
                    'token' => $token,
                    'akademik' => $akademik,
                    'user' => $user,
                ]);
            }
        }
        else {
            // Buat alert untuk belum login
            Alert::error('Anda Belum Login !');
            return view('auth');
        }
    }

    public function datamahasiswa()
    {
        //cek sudah login apa belum
        if (Auth::check()){
            //jika sudah login eksekusi
            //get dfata return dari repo
            // Auth berhasil
            $user = Auth::user();

            //dapatkan user dengan role akademik
            $mahasiswa = $this->mahasiswaRepo->index();

            // Generate token JWT
            $token = $this->generateSanctumToken($user);
            $user->token = $token;

            //pengecekan login / jika login diarahkan ke hal profile
            if ($mahasiswa && $user) {
                //ke halaman daftar data mahasiswa
                return view('dashboard.akademik.datamahasiswa')->with([
                    'token' => $token,
                    'mahasiswa' => $mahasiswa,
                    'user' => $user,
                ]);
            }
        }
        else {
            // Buat alert untuk belum login
            Alert::error('Anda Belum Login !');
            return view('auth');
        }
    }

    protected function generateSanctumToken($user)
    {
        $token = $user->createToken('api-token')->plainTextToken;
        return $token;
    }

}
