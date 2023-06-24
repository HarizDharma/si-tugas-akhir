<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Akademik\AkademikRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class WebPanitiaController extends Controller
{
    private $akademikRepo;
    public function __construct(AkademikRepositoryInterface $akademikRepo)
    {
        $this->akademikRepo = $akademikRepo;
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

            return view('dashboard.panitia.index')->with([
                'token' => $token,
                'user' => $user,
            ]);
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
            Alert::danger('Anda Belum Login !');
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
            $akademik = $this->akademikRepo->index();

            // Generate token JWT
            $token = $this->generateSanctumToken($user);
            $user->token = $token;

            //pengecekan login / jika login diarahkan ke hal profile
            if ($akademik && $user) {
                //ke halaman daftar data mahasiswa
                return view('dashboard.akademik.datamahasiswa')->with([
                    'token' => $token,
                    'akademik' => $akademik,
                    'user' => $user,
                ]);
            }
        }
        else {
            // Buat alert untuk belum login
            Alert::danger('Anda Belum Login !');
            return view('auth');
        }
    }

    protected function generateSanctumToken($user)
    {
        $token = $user->createToken('api-token')->plainTextToken;
        return $token;
    }

}
