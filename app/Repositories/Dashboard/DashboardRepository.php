<?php

namespace App\Repositories\Dashboard;

use App\Http\Resources\MahasiswaResources;
use App\Models\User;
use App\Models\Verifikasi;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ResponseResource;
use App\Http\Resources\UserResouces;
class DashboardRepository implements DashboardRepositoryInterface
{
    public function index($platform = 'api')
    {
        if (Auth::check()) {
            $user = Auth::user();
            if($user->hasRole('mahasiswa')) {
                $mahasiswa = User::whereHas('roles', function ($query) {
                    $query->where('name', 'mahasiswa');
                })->find($user->id);

                return $platform == 'web' ?
                    formatResponseResource(true, 'Role Mahasiswa', formatMahasiswaResource($mahasiswa))
                    : new ResponseResource(true, 'Role Mahasiswa', UserResouces::make($mahasiswa));
            }
            else if($user->hasRole('panitia')) {

                $mahasiswa = User::whereHas('roles', function ($query) {
                    $query->where('role', 'mahasiswa');
                })->count();

                $mahasiswaBelumVerifAkademik = User::where('role', 'mahasiswa')
                    ->whereHas('mahasiswa', function ($query) {
                        $query->whereHas('verif', function ($query) {
                            $query->where('verifikasi_akademik', 0);
                        });
                    })
                    ->with(['mahasiswa.verif' => function ($query) {
                        $query->where('verifikasi_akademik', 0);
                    }])
                    ->count();

                $mahasiswaBelumVerifSemproPanitia = User::where('role', 'mahasiswa')
                    ->whereHas('mahasiswa', function ($query) {
                        $query->whereHas('verif', function ($query) {
                            $query->where('verifikasi_panitia_sempro', 0);
                        });
                    })
                    ->with(['mahasiswa.verif' => function ($query) {
                        $query->where('verifikasi_panitia_sempro', 0);
                    }])
                    ->count();

                $mahasiswaSudahVerifSemproPanitia = User::where('role', 'mahasiswa')
                    ->whereHas('mahasiswa', function ($query) {
                        $query->whereHas('verif', function ($query) {
                            $query->where('verifikasi_panitia_sempro', 1);
                        });
                    })
                    ->with(['mahasiswa.verif' => function ($query) {
                        $query->where('verifikasi_panitia_sempro', 1);
                    }])
                    ->count();

                $mahasiswaBelumVerifSidangAkhirPanitia = User::where('role', 'mahasiswa')
                    ->whereHas('mahasiswa', function ($query) {
                        $query->whereHas('verif', function ($query) {
                            $query->where('verifikasi_panitia_sidang_akhir', 0);
                        });
                    })
                    ->with(['mahasiswa.verif' => function ($query) {
                        $query->where('verifikasi_panitia_sidang_akhir', 0);
                    }])
                    ->count();

                $mahasiswaSudahVerifSidangAkhirPanitia = User::where('role', 'mahasiswa')
                    ->whereHas('mahasiswa', function ($query) {
                        $query->whereHas('verif', function ($query) {
                            $query->where('verifikasi_panitia_sidang_akhir', 1);
                        });
                    })
                    ->with(['mahasiswa.verif' => function ($query) {
                        $query->where('verifikasi_panitia_sidang_akhir', 1);
                    }])
                    ->count();

                $mahasiswaBelumProgress = User::with('mahasiswa')
                    ->whereHas('mahasiswa', function ($querry){
                        $querry->whereHas('status', function ($querry) {
                            $querry->where('id', 1);
                        });
                    })
                    ->count();

                $mahasiswaBelumSempro = User::with('mahasiswa')
                    ->whereHas('mahasiswa', function ($querry){
                        $querry->whereHas('status', function ($querry) {
                            $querry->where('id', 2);
                        });
                    })
                    ->count();

                $mahasiswaLulusSempro = User::with('mahasiswa')
                    ->whereHas('mahasiswa', function ($querry){
                        $querry->whereHas('status', function ($querry) {
                            $querry->where('id', 3);
                        });
                    })
                    ->count();
                $mahasiswaSudahSidang_Ulang = User::with('mahasiswa')
                    ->whereHas('mahasiswa', function ($querry){
                        $querry->whereHas('status', function ($querry) {
                            $querry->where('id', 5);
                        });
                    })
                    ->count();
                $mahasiswaSudahSidang_Done = User::with('mahasiswa')
                    ->whereHas('mahasiswa', function ($querry){
                        $querry->whereHas('status', function ($querry) {
                            $querry->where('id', 5);
                        });
                    })
                    ->count();
                $panitia = User::whereHas('roles', function ($query) {
                    $query->where('role', 'panitia');
                })->count();

                $akademik = User::whereHas('roles', function ($query) {
                    $query->where('role', 'akademik');
                })->count();

                $dataOut = [
                    'total_mahasiswa' => $mahasiswa,
                    'total_panitia' => $panitia,

                    'mahasiswa_verif_panitia_sempro' => $mahasiswaSudahVerifSemproPanitia,
                    'mahasiswa_verif_panitia_sidang_akhir' => $mahasiswaSudahVerifSidangAkhirPanitia,

                    'mahasiswa_belum_verif_panitia_sempro' => $mahasiswaBelumVerifSemproPanitia,
                    'mahasiswa_belum_verif_panitia_sidang_akhir' => $mahasiswaBelumVerifSidangAkhirPanitia,

                    'mahasiswa_belum_progress' => $mahasiswaBelumProgress,
                    'mahasiswa_belum_sempro' =>$mahasiswaBelumSempro,
                    'mahasiswa_lulus_sempro' => $mahasiswaLulusSempro,
                    'mahasiswa_sidang_ulang' => $mahasiswaSudahSidang_Ulang,
                    'mahasiswa_sidang_lulus' => $mahasiswaSudahSidang_Done,
                ];
                return $platform == 'web' ?
                    formatResponseResource(true, 'Role Panitia', $dataOut)
                    : new ResponseResource(true, 'Role Panitia', $dataOut);
            }
            else if($user->hasRole('akademik')) {

                $mahasiswa = User::whereHas('roles', function ($query) {
                    $query->where('role', 'mahasiswa');
                })->count();

                $mahasiswaBelumVerifAkademik = User::where('role', 'mahasiswa')
                    ->whereHas('mahasiswa', function ($query) {
                        $query->whereHas('verif', function ($query) {
                            $query->where('verifikasi_akademik', 0);
                        });
                    })
                    ->with(['mahasiswa.verif' => function ($query) {
                        $query->where('verifikasi_akademik', 0);
                    }])
                    ->count();

//                $mahasiswaBelumVerifPanitia = User::where('role', 'mahasiswa')
//                    ->whereHas('mahasiswa', function ($query) {
//                        $query->whereHas('verif', function ($query) {
//                            $query->where('verifikasi_panitia', 0);
//                        });
//                    })
//                    ->with(['mahasiswa.verif' => function ($query) {
//                        $query->where('verifikasi_panitia', 0);
//                    }])
//                    ->count();

//                $mahasiswaBelumProgress = User::with('mahasiswa')
//                    ->whereHas('mahasiswa', function ($querry){
//                        $querry->whereHas('status', function ($querry) {
//                            $querry->where('id', 1);
//                        });
//                    })
//                    ->count();
//
//                $mahasiswaBelumSempro = User::with('mahasiswa')
//                    ->whereHas('mahasiswa', function ($querry){
//                        $querry->whereHas('status', function ($querry) {
//                            $querry->where('id', 2);
//                        });
//                    })
//                    ->count();
//
//                $mahasiswaLulusSempro = User::with('mahasiswa')
//                    ->whereHas('mahasiswa', function ($querry){
//                        $querry->whereHas('status', function ($querry) {
//                            $querry->where('id', 3);
//                        });
//                    })
//                    ->count();
//                $mahasiswaSudahSidang_Ulang = User::with('mahasiswa')
//                    ->whereHas('mahasiswa', function ($querry){
//                        $querry->whereHas('status', function ($querry) {
//                            $querry->where('id', 5);
//                        });
//                    })
//                    ->count();
                $mahasiswaSudahSidang_Done = User::with('mahasiswa')
                    ->whereHas('mahasiswa', function ($querry){
                        $querry->whereHas('status', function ($querry) {
                            $querry->where('id', 5);
                        });
                    })
                    ->count();
                $panitia = User::whereHas('roles', function ($query) {
                    $query->where('role', 'panitia');
                })->count();

                $akademik = User::whereHas('roles', function ($query) {
                    $query->where('role', 'akademik');
                })->count();

                $dataOut = [
                    'total_mahasiswa' => $mahasiswa,
                    'total_panitia' => $panitia,
                    'total_akademik' => $akademik,
                    'mahasiswa_belum_verif_akademik' => $mahasiswaBelumVerifAkademik ,
//                    'mahasiswa_belum_verif_panitia' => $mahasiswaBelumVerifPanitia,
//                    'mahasiswa_belum_progress' => $mahasiswaBelumProgress,
//                    'mahasiswa_belum_sempro' =>$mahasiswaBelumSempro,
//                    'mahasiswa_lulus_sempro' => $mahasiswaLulusSempro,
//                    'mahasiswa_sidang_ulang' => $mahasiswaSudahSidang_Ulang,
                    'mahasiswa_sidang_lulus' => $mahasiswaSudahSidang_Done,
//                    'mahasiswa_sudah_lulus' => $mahasiswaSudahSidang_Done,
                ];
                return $platform == 'web' ?
                    formatResponseResource(true, 'Role akadmik', $dataOut)
                    : new ResponseResource(true, 'Role akadmik', $dataOut);
            }
            else {
                return $platform == 'web' ?
                    formatResponseResource(false, 'Unauthorized, Please Login' )
                    : new ResponseResource(false, 'Unauthorized, Please Login');
            }
        }
        else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login' )
                : new ResponseResource(false, 'Unauthorized, Please Login');
        }
    }
}
