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
        if ($auth) {
            return view('dashboard.index')->with($auth);
        }
        else {
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
        return view('dashboard.index')->with($auth);

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

        return Redirect::route('auth')->with([
            'message' => 'Anda Berhasil Logout !',
        ]);
    }

}