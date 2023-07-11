<?php

namespace App\Http\Controllers\Web;

use App\Repositories\Auth\AuthRepositoryInterface;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WebAuthController extends Controller
{
    private $authRepo;
    public function __construct(AuthRepositoryInterface $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    //index plus pengecekan login
    public function index()
    {
        //get siapa yang login denga authRepo dengan platform web
        $auth = $this->authRepo->index('web');
        //cek status sudah login true atau false
        if ($auth['status'])
        {

            //pengecekan role ketik sudah login
            if ($auth['data']['role'] == 'akademik')
            {
                //jika yang sudah login akademik
                return redirect()->route('akademik');
            }
            elseif ($auth['data']['role'] == 'panitia')
            {
                //jika yang sudah login panitia
                return redirect()->route('panitia');
            }
            elseif ($auth['data']['role'] == 'mahasiswa')
            {
                //jika yang sudah login mahasiswa
                return redirect()->route('mahasiswa');
            }
        }
        else
        {
            return view('auth');
        }
    }

    public function login(LoginRequest $request)
    {
        $auth = $this->authRepo->login('web',$request);
        //pengecekan status apakah true login
        if ($auth['status']) {
            // Buat session flash untuk alert berhasil login
            // Flash the success message
            alert()->success('Berhasil', 'Selamat Datang !');

            //jika nilai $auth status true
            if ($auth['data']['role'] == "akademik")
            {
                //jika yang login akademik
                return redirect()->route('akademik');
            }
            elseif ($auth['data']['role'] == "panitia")
            {
                //jika yang login panitia
                return redirect()->route('panitia');
            }
            elseif ($auth['data']['role'] == "mahasiswa")
            {
                //jika yang login mahasiswa
                return redirect()->route('mahasiswa');
            }
        } else
        {
            //jika status not true/false
            Alert::error('Error', 'Userame dan Password Salah !');
            return view('auth');
        }
    }
    public function logout()
    {
        $auth = $this->authRepo->logout('web');
        if (!$auth) {
            return response()->json(['message' => 'Failed to Logout'], 401);
        }
        // Hapus sesi pengguna
        Auth::logout(); // Logout the user
        session()->invalidate();
        session()->regenerateToken();

        Alert::success("Berhasil", "Berhasil Logout !");
        //jika logout route ke auth login halaman
        return redirect()->route('auth');
    }

}
