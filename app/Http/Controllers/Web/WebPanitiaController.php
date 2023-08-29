<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\HasilSidang\CreateHasilSidangRequest;
use App\Models\Mahasiswa;
use App\Repositories\Auth\AuthRepositoryInterface;
use App\Repositories\Dashboard\DashboardRepositoryInterface;
use App\Repositories\HasilSidang\HasilSidangRepositoryInterface;
use App\Repositories\Mahasiswa\MahasiswaRepositoryInterface;
use App\Repositories\Panitia\PanitiaRepositoryInterface;
use App\Repositories\Akademik\AkademikRepositoryInterface;
use App\Repositories\TahapSidang\TahapSidangRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class WebPanitiaController extends Controller
{
    private $panitiaRepo;
    private $mahasiswaRepo;
    private $authRepo;
    private $dashboardRepo;
    private $jadwalSidangRepo;
    private $hasilSidangRepo;
    public function __construct(AuthRepositoryInterface $authRepo,
                                AkademikRepositoryInterface $panitiaRepo,
                                MahasiswaRepositoryInterface $mahasiswaRepo,
                                DashboardRepositoryInterface $dashboardRepository,
                                TahapSidangRepositoryInterface $jadwalSidangRepo,
                                HasilSidangRepositoryInterface $hasilSidangRepo)
    {
        $this->panitiaRepo = $panitiaRepo;
        $this->mahasiswaRepo = $mahasiswaRepo;
        $this->authRepo = $authRepo;
        $this->dashboardRepo = $dashboardRepository;
        $this->jadwalSidangRepo = $jadwalSidangRepo;
        $this->hasilSidangRepo = $hasilSidangRepo;
    }

    //index plus pengecekan login
    public function index()
    {
        $auth = $this->authRepo->index('web');
        $panitia =  $this->dashboardRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the academic dashboard
            return view('dashboard.panitia.index', compact('auth', 'panitia'));
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa
    public function datamahasiswa()
    {
        $auth = $this->authRepo->index('web');
        //ambil datamahasiswa get all dari repository
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the datamahasiswa and pass the data using compact()
            return view('dashboard.panitia.datamahasiswa', compact('auth', 'mahasiswa'));
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa yang belum verifikasi panitia
    public function konfirmasipanitia()
    {
        $auth = $this->authRepo->index('web');
        //ambil dataakademik get all dari repository
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the panitia data mahasiswa yang belum verifikasi and pass the data using compact()
            return view('dashboard.panitia.datakonfirmasi', compact('auth', 'mahasiswa'));
        } else {
            return view('auth');
        }
    }

    //method verifikasi data mahasiswa
    public function verifikasimahasiswa($id)
    {
        //ambil data siapa yang login
        $auth = $this->authRepo->index('web');
        // Jika status true
        if ($auth['status']) {
            //ambil datamahasiswa verifikasi dari repository jadi sudah sempro jika sudah di acc panitia
            $mahasiswa = $this->mahasiswaRepo->VerifikasiPanitiaSempro( $id, 1, 'web');

            // Pengecekan apakah data berhasil di verifikasi
            if ($mahasiswa) {
                // Buat session flash untuk notifikasi sukses delete
                Alert::success("Berhasil", "Verifikasi Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('konfirmasipanitia');
            } else {
                // Buat session flash untuk notifikasi sukses
                Alert::error("Gagal", "Verifikasi Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('konfirmasipanitia');
            }
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa yang sudah verifikasi sempro
    public function dataterverifikasisempro()
    {
        $auth = $this->authRepo->index('web');
        //ambil dataakademik get all dari repository
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the panitia data mahasiswa yang belum verifikasi and pass the data using compact()
            return view('dashboard.panitia.dataterverifikasisempro', compact('auth', 'mahasiswa'));
        } else {
            return view('auth');
        }
    }

    //function untuk atur jadwal sidang
    public function updateMahasiswaJadwalSidang($id, Request $request){
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            // Buat session flash untuk notifikasi gagal
            Alert::error("Gagal", "Mahasiswa tidak ditemukan");

            // Redirect ke halaman yang diinginkan
            return redirect()->route('dataterverifikasisempro');
        }

        // If Mahasiswa is found, proceed to update the record
        $mahasiswa->update(['sidang_id' => $request->jadwal_sidang]);

        // Pengecekan apakah waktu berhasil di tambahkan
        if ($mahasiswa) {
            // Buat session flash untuk notifikasi sukses
            Alert::success("Berhasil", "Atur Jadwal Sidang");

            // Redirect ke halaman yang diinginkan
            return redirect()->route('dataterverifikasisempro');
        } else {
            // Buat session flash untuk notifikasi gagal
            Alert::error("Gagal", "Atur Jadwal Sidang");

            // Redirect ke halaman yang diinginkan
            return redirect()->route('dataterverifikasisempro');
        }
    }

    //method tambah hasil sidang
    public function tambahhasilsidang($id, Request $request)
    {
        // Ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            try {
                // Create data di database dengan repository hasil sidang
                $hasilSidang = $this->hasilSidangRepo->store('api', $id, $request);

                // Pengecekan apakah data berhasil di create
                if ($hasilSidang) {
                    // Buat session flash untuk notifikasi sukses
                    Alert::success("Berhasil", "Tambah Hasil Sidang Mahasiswa");
                } else {
                    // Buat session flash untuk notifikasi gagal
                    Alert::error("Gagal", "Tambah Hasil Sidang Mahasiswa");
                }

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataterverifikasisempro');
            } catch (\Exception $e) {
                // Buat session flash untuk notifikasi gagal
                Alert::error("Gagal", "Tambah Hasil Sidang Mahasiswa: " . $e->getMessage());

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataterverifikasisempro');
            }
        } else {
            return view('auth');
        }
    }

    //method halaman terverifikasi untuk merubah status setelah tambah hasil sidang
    public function editstatusmahasiswa($id, Request $request)
    {
        //ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            //ambil datamahasiswa by id yang sudah di lempar dari form action
            $mahasiswa = Mahasiswa::find($id);

            if (!$mahasiswa) {
                // Buat session flash untuk notifikasi gagal
                Alert::error("Gagal", "Mahasiswa tidak ditemukan");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataterverifikasisempro');
            }

            // If Mahasiswa ada, update data status
            $mahasiswa->update(['status_id' => $request->status_id]);

            // Pengecekan apakah data berhasil di verifikasi
            if ($mahasiswa) {
                // Buat session flash untuk notifikasi sukses delete
                Alert::success("Berhasil", "Ubah Status Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataterverifikasisempro');
            } else {
                // Buat session flash untuk notifikasi sukses
                Alert::error("Gagal", "Berhasil Ubah Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataterverifikasisempro');
            }
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa yang gagal sempro
    public function datagagalsempro()
    {
        $auth = $this->authRepo->index('web');
        //ambil datamahasiswa dari repository

        $jadwal = $this->jadwalSidangRepo->index('web');
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the panitia data mahasiswa yang belum verifikasi and pass the data using compact()
            return view('dashboard.panitia.datagagalsempro', compact('auth', 'mahasiswa', 'jadwal'));
        } else {
            return view('auth');
        }
    }

    //function untuk atur jadwal sidang
    public function ubahJadwalSidang($id, Request $request){
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            // Buat session flash untuk notifikasi gagal
            Alert::error("Gagal", "Mahasiswa tidak ditemukan");

            // Redirect ke halaman yang diinginkan
            return redirect()->route('datagagalsempro');
        }

        // If Mahasiswa is found, proceed to update the record
        $mahasiswa->update(['sidang_id' => $request->jadwal_sidang_ulang]);

        // Pengecekan apakah waktu berhasil di tambahkan
        if ($mahasiswa) {
            // Buat session flash untuk notifikasi sukses
            Alert::success("Berhasil", "Atur Jadwal Sidang");

            // Redirect ke halaman yang diinginkan
            return redirect()->route('datagagalsempro');
        } else {
            // Buat session flash untuk notifikasi gagal
            Alert::error("Gagal", "Atur Jadwal Sidang");

            // Redirect ke halaman yang diinginkan
            return redirect()->route('datagagalsempro');
        }
    }

    //method ubah hasil sidang yang gagal sidang sempro mengulangi
    public function ubahhasilsidang($id, Request $request)
    {
        //ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            //ambil datamahasiswa verifikasi dari repository
            $hasilSidang = $this->hasilSidangRepo->update('api', $id, $request);

            // Pengecekan apakah data berhasil di ubah
            if ($hasilSidang) {
                // Buat session flash untuk notifikasi sukses ubah
                Alert::success("Berhasil", "Ubah Hasil Sidang Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datagagalsempro');
            } else {
                // Buat session flash untuk notifikasi sukses
                Alert::error("Gagal", "Ubah Hasil Sidang Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datagagalsempro');
            }
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa yang sudah verifikasi panitia
    public function mahasiswalolos()
    {
        $auth = $this->authRepo->index('web');
        //ambil datamahasiswa dari repository

        $jadwal = $this->jadwalSidangRepo->index('web');
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the panitia data mahasiswa yang belum verifikasi and pass the data using compact()
            return view('dashboard.panitia.datalolos', compact('auth', 'mahasiswa', 'jadwal'));
        } else {
            return view('auth');
        }
    }

    //method verifikasi mahasiswa daftar sidang akhir
    public function verifikasisidangakhir($id)
    {
        //ambil data siapa yang login
        $auth = $this->authRepo->index('web');
        // Jika status true
        if ($auth['status']) {
            //ambil datamahasiswa verifikasi dari repository jadi sudah sempro jika sudah di acc panitia
            $mahasiswa = $this->mahasiswaRepo->VerifikasiPanitiaSidang( $id, 1, 'web');

            // Pengecekan apakah data berhasil di verifikasi
            if ($mahasiswa) {
                // Buat session flash untuk notifikasi sukses delete
                Alert::success("Berhasil", "Verifikasi Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datamahasiswalolos');
            } else {
                // Buat session flash untuk notifikasi sukses
                Alert::error("Gagal", "Verifikasi Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datamahasiswalolos');
            }
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa untuk halaman data lolos sidang daftar akhir mahasiswa
    public function datalolossidang()
    {
        $auth = $this->authRepo->index('web');
        //ambil datamahasiswa get all dari repository
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status login true
        if ($auth['status']) {
            // Redirect to the datagagalsidang and pass the data using compact()
            return view('dashboard.panitia.datalolossidang', compact('auth', 'mahasiswa'));
        } else {
            return view('auth');
        }
    }

    //method tambah hasil sidang
    public function tambahhasilsidangakhir($id, Request $request)
    {
        // Ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            try {
                // Create data di database dengan repository hasil sidang
                $hasilSidang = $this->hasilSidangRepo->storeAkhir('api', $id, $request);

                // Pengecekan apakah data berhasil di create
                if ($hasilSidang) {
                    // Buat session flash untuk notifikasi sukses
                    Alert::success("Berhasil", "Tambah Hasil Sidang Akhir Mahasiswa");
                } else {
                    // Buat session flash untuk notifikasi gagal
                    Alert::error("Gagal", "Tambah Hasil Sidang Akhir Mahasiswa");
                }

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datalolossidang');
            } catch (\Exception $e) {
                // Buat session flash untuk notifikasi gagal
                Alert::error("Gagal", "Tambah Hasil Sidang Akhir Mahasiswa: " . $e->getMessage());

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datalolossidang');
            }
        } else {
            return view('auth');
        }
    }



    //getall data mahasiswa untuk halaman data gagal sidang mahasiswa
    public function datagagalsidang()
    {
        $auth = $this->authRepo->index('web');
        //ambil datamahasiswa get all dari repository
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status login true
        if ($auth['status']) {
            // Redirect to the datagagalsidang and pass the data using compact()
            return view('dashboard.panitia.datagagalsidang', compact('auth', 'mahasiswa'));
        } else {
            return view('auth');
        }
    }

    //method ubah hasil sidang akhir
    public function ubahhasilsidangakhir($id, Request $request)
    {
        // Ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            try {
                // Create data di database dengan repository hasil sidang
                $hasilSidang = $this->hasilSidangRepo->updateAkhir('api', $id, $request);

                // Pengecekan apakah data berhasil di create
                if ($hasilSidang) {
                    // Buat session flash untuk notifikasi sukses
                    Alert::success("Berhasil", "Ubah Hasil Sidang Akhir Mahasiswa");
                } else {
                    // Buat session flash untuk notifikasi gagal
                    Alert::error("Gagal", "Ubah Hasil Sidang Akhir Mahasiswa");
                }

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datagagalsidang');
            } catch (\Exception $e) {
                // Buat session flash untuk notifikasi gagal
                Alert::error("Gagal", "Ubah Hasil Sidang Akhir Mahasiswa: " . $e->getMessage());

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datagagalsidang');
            }
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa untuk halaman data sudah sidang akhir mahasiswa
    public function datasudahsidangakhir()
    {
        $auth = $this->authRepo->index('web');
        //ambil datamahasiswa get all dari repository
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status login true
        if ($auth['status']) {
            // Redirect to the datagagalsidang and pass the data using compact()
            return view('dashboard.panitia.datasudahsidangakhir', compact('auth', 'mahasiswa'));
        } else {
            return view('auth');
        }
    }

    //get halaman untuk set jadwal sidang
    public function jadwalsidang()
    {
        $auth = $this->authRepo->index('web');
        $jadwal = $this->jadwalSidangRepo->index('web');
        // Jika status true
        if ($auth['status']) {
            // Redirect to the panitia data mahasiswa yang belum verifikasi and pass the data using compact()
            return view('dashboard.panitia.jadwalsidang', compact('auth', 'jadwal'));
        } else {
            return view('auth');
        }
    }

    //set jadwal sidang
    public function updateJadwalSidang($id, Request $request){
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            //ambil data
            $tahap = $this->jadwalSidangRepo->update($id, $request);

            // Pengecekan apakah data berhasil di ubah
            if ($tahap) {
                // Buat session flash untuk notifikasi sukses ubah
                Alert::success("Berhasil", "Ubah Hasil Tanggal Sidang");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('jadwalsidang');
            } else {
                // Buat session flash untuk notifikasi gagal ubah
                Alert::error("Gagal", "Ubah Hasil Tanggal Sidang");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('jadwalsidang');
            }
        } else {
            return view('auth');
        }
    }

    //    //getall data mahasiswa untuk halaman data gagal sidang mahasiswa
//    public function gagalsidang()
//    {
//        $auth = $this->authRepo->index('web');
//        //ambil datamahasiswa get all dari repository
//        $mahasiswa = $this->mahasiswaRepo->index('web');
//
//        // Jika status login true
//        if ($auth['status']) {
//            // Redirect to the datagagalsidang and pass the data using compact()
//            return view('dashboard.panitia.datagagalsidang', compact('auth', 'mahasiswa'));
//        } else {
//            return view('auth');
//        }
//    }

    protected function generateSanctumToken($user)
    {
        $token = $user->createToken('api-token')->plainTextToken;
        return $token;
    }

}
