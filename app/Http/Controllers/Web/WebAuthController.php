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
        //get siapa yang login denga authRepo dengan platform web
        $auth = $this->authRepo->index('web');
        //cek status sudah login true atau false
        if ($auth['status'])
        {
            //pengecekan role ketik sudah login
            if ($auth['data']['role'] == 'akademik')
            {
                //jika yang login akademik
                return redirect()->route('akademik')->with($auth);
            }
            elseif ($auth['data']['role'] == 'panitia')
            {
                //jika yang login panitia
                return redirect()->route('panitia')->with($auth);
            }
            elseif ($auth['data']['role'] == 'mahasiswa')
            {
                //jika yang login mahasiswa
                return redirect()->route('mahasiswa')->with($auth);
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
        if (!$auth) {

            Alert::error('Error', 'Username atau password salah.');
            return view('auth')->withErrors([
                'username' => 'Username atau password salah.',
            ]);
        }
        Alert::success('Berhasil', $auth['message']);
        return view('dashboard.akademik.index')->with($auth)->withErrors(
            [
                'Berhasil' => $auth['message'],
            ]
        );

    }
    public function logout()
    {
        $auth = $this->authRepo->logout('web');
        if (!$auth) {
            return response()->json(['message' => 'Failed to Logout'], 401);
        }
        // Hapus sesi pengguna
        session()->invalidate();
        session()->regenerateToken();

        return Redirect::route('auth')->with([
            'message' => 'Anda Berhasil Logout !',
        ]);
    }

}
