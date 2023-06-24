<?php

namespace App\Http\Controllers\Web;

use App\Repositories\Auth\AuthRepositoryInterface;
use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        $auth = $this->authRepo->index();

        // Jika data berhasil ditemukan
        if ($auth) {
            //buat alert untuk berhasil login
            Alert::success('Selamat Datang');

            // Cek role
            if ($auth['user']['role'] == 'mahasiswa') {
                //jika yang login mahasiswa
                return redirect()->route('mahasiswa')->with($auth);

            } elseif ($auth['user']['role'] == 'panitia') {
                //jika yang login panitia
                return redirect()->route('panitia')->with($auth);

            } elseif ($auth['user']['role'] == 'akademik') {
                //jika yang login akademik
                return redirect()->route('akademik')->with($auth);
            }
        } else {
            //jika tidak login
            // Jika data tidak ditemukan atau role tidak cocok
            return view('auth');
        }


    }

    public function login(LoginRequest $request)
    {
        $auth = $this->authRepo->login($request);
        if (!$auth) {

            Alert::error('Error', 'Username atau password salah.');
            return view('auth')->withErrors([
                'username' => 'Username atau password salah.',
            ]);
        }

        return $this->index();
    }
    public function logout()
    {
        $auth = $this->authRepo->logout();
        if (!$auth) {
            return response()->json(['message' => 'Failed to Logout'], 401);
        }
        // Hapus sesi pengguna
        session()->invalidate();
        session()->regenerateToken();

        //buat alert untuk berhasil login
        Alert::success('Berhasil Logout');
        return Redirect::route('auth')->withErrors([
            'message' => 'Anda Berhasil Logout !',
        ]);
    }

}
