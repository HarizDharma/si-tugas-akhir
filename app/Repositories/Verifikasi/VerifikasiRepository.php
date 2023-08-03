<?php

namespace App\Repositories\Verifikasi;

use App\Http\Resources\ResponseResource;
use App\Http\Resources\UserResouces;
use App\Models\User;
use App\Models\Verifikasi;
use Illuminate\Support\Facades\Auth;

class VerifikasiRepository implements VerifikasiRepositoryInterface
{
    public function index($platform = 'api')
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik atau Panita (ROLE == MAHASISWA)
            if($user->hasRole('mahasiswa')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Unauthorized, Please Login' )
                    : new ResponseResource(false, 'Unauthorized, Please Login');
            }

            $mahasiswa =  User::where('role', 'mahasiswa')
                ->whereHas('mahasiswa', function ($query) {
                    $query->whereHas('verif');
                })
                ->with(['mahasiswa.verif'])
                ->get();


            return $platform == 'web' ?
                formatResponseResource(true, 'List User Mahasiswa Verifikasi', $mahasiswa, $user->token )
                : new ResponseResource(true, 'List User Mahasiswa Verifikasi', $mahasiswa);

        } else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login' )
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }
    public function show($idUser, $platform = 'api')
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik atau Panita (ROLE == MAHASISWA)
            if($user->hasRole('mahasiswa')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Unauthorized, Please Login' )
                    : new ResponseResource(false, 'Unauthorized, Please Login');
            }

            $mahasiswa = User::where('role', 'mahasiswa')
                ->whereHas('mahasiswa', function ($query) {
                    $query->whereHas('verif');
                })
                ->with(['mahasiswa.verif'])
                ->find($idUser);

            return $platform == 'web' ?
                formatResponseResource(true, 'List User Mahasiswa Verifikasi', $mahasiswa, $user->token )
                : new ResponseResource(true, 'List User Mahasiswa Verifikasi', $mahasiswa);

        } else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login' )
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }
    public function verifikasiAkademik($idUser, $platform = 'api')
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik atau Panita (ROLE == MAHASISWA)
            if($user->hasRole('mahasiswa')) {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Unauthorized, Please Login' )
                    : new ResponseResource(false, 'Unauthorized, Please Login');
            }

            $mahasiswa = User::where('role', 'mahasiswa')
                ->whereHas('mahasiswa', function ($query) {
                    $query->whereHas('verif');
                })
                ->with(['mahasiswa.verif'])
                ->find($idUser);

            return $platform == 'web' ?
                formatResponseResource(true, 'List User Mahasiswa Verifikasi', $mahasiswa, $user->token )
                : new ResponseResource(true, 'List User Mahasiswa Verifikasi', $mahasiswa);

        }
    }



    public function verifikasiPanitia($idUser, $platform = 'api')
    {

    }
}
