<?php

namespace App\Repositories\Mahasiswa;

use App\Http\Requests\Mahasiswa\CreateMahasiswaRequest;
use App\Http\Requests\Mahasiswa\UpdateMahasiswaRequest;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\UserResouces;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MahasiswaRepository implements MahasiswaRepositoryInterface
{
    public function index()
    {
        // Mengecek apakah pengguna sudah terautentikasi
        if (Auth::check()) {
            $user = Auth::user();

            // Return Jika Role bukan akademik atau Panita
            if(!$user->hasRole('akademik') || !$user->hasRole('panitia')) {
                //  Format Return Response Resource
                //  return [
                //      'status' => $this->status,
                //      'message' => $this->message,
                //      'data' => $data,
                //  ];
                return new ResponseResource(false, 'Tidak Mempunyai Hak Akses');
            }

            $mahasiswa = User::whereHas('roles', function ($query) {
                $query->where('role', 'mahasiswa');
            })->get();

            //  Format Return Response Resource
            //  return [
            //      'status' => $this->status,
            //      'message' => $this->message,
            //      'data' => $data,
            //  ];
            return new ResponseResource(true, 'List User Mahasiswa', UserResouces::collection($mahasiswa));

        } else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return ['status' => false, 'message' => 'Unauthorized, Please Login'];
        }
    }
    public function show($id)
    {
        // TODO: Implement show() method.
    }
    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
    public function update(UpdateMahasiswaRequest $request, $id)
    {
        // TODO: Implement update() method.
    }
    public function store(CreateMahasiswaRequest $request)
    {
        // TODO: Implement store() method.
    }
}
