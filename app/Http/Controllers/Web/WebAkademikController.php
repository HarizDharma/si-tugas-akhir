<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Akademik\UpdateAkademikRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Akademik\AkademikRepositoryInterface;
use App\Repositories\Mahasiswa\MahasiswaRepositoryInterface;
use App\Repositories\Panitia\PanitiaRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class WebAkademikController extends Controller
{
    //deklarasi untuk menmpung repository mahasiswa,panitia dan akademik
    private $akademikRepo;
    private $panitiaRepo;
    private $mahasiswaRepo;

    public function __construct(AkademikRepositoryInterface $akademikRepo, PanitiaRepositoryInterface $panitiaRepo, MahasiswaRepositoryInterface $mahasiswaRepo)
    {
        //manggil repo lalu dimasukkan ke var private diatas
        $this->akademikRepo = $akademikRepo;
        $this->panitiaRepo = $panitiaRepo;
        $this->mahasiswaRepo = $mahasiswaRepo;
    }

    //index plus pengecekan login
    public function index()
    {
        //get dfata return dari repo
        // Auth berhasil
        $user = Auth::user();

        if ($user) {

            // Generate token JWT
            $token = $this->generateSanctumToken($user);
            $user->token = $token;

            // Buat alert untuk berhasil login
            session()->flash('success', 'Selamat Datang');

            return view('dashboard.akademik.index')->with([
                'token' => $token,
                'user' => $user,
            ]);
        } else {
            return view('auth');
        }
    }


    public function dataakademik()
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
                //ke halaman daftar data akademik
                return view('dashboard.akademik.dataakademik')->with([
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
