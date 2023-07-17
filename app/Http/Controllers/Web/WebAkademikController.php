<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Akademik\CreateAkademikRequest;
use App\Http\Requests\Akademik\UpdateAkademikRequest;
use App\Http\Requests\Mahasiswa\CreateMahasiswaRequest;
use App\Http\Requests\Mahasiswa\UpdateMahasiswaRequest;
use App\Http\Requests\Panitia\CreatePanitiaRequest;
use App\Http\Requests\Panitia\UpdatePanitiaRequest;
use App\Repositories\Akademik\AkademikRepositoryInterface;
use App\Repositories\Auth\AuthRepositoryInterface;
use App\Repositories\Mahasiswa\MahasiswaRepositoryInterface;
//use App\Repositories\Panitia\PanitiaRepositoryInterface;
use App\Repositories\Panitia\PanitiaRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WebAkademikController extends Controller
{
    //deklarasi untuk menmpung repository mahasiswa,panitia dan akademik
    private $akademikRepo;
    private $panitiaRepo;
    private $authRepo;
    private $mahasiswaRepo;

    public function __construct(AkademikRepositoryInterface $akademikRepo, PanitiaRepositoryInterface $panitiaRepo, MahasiswaRepositoryInterface $mahasiswaRepo, AuthRepositoryInterface $authRepo)
    {
        //manggil repo lalu dimasukkan ke var private diatas
        $this->akademikRepo = $akademikRepo;
        $this->panitiaRepo = $panitiaRepo;
        $this->mahasiswaRepo = $mahasiswaRepo;
        $this->authRepo = $authRepo;
    }

    //index plus pengecekan login
    public function index()
    {
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the academic dashboard
            return view('dashboard.akademik.index')->with($auth);
        } else {
            return view('auth');
        }
    }


    //getall data akademik
    public function dataakademik()
    {
        $auth = $this->authRepo->index('web');
        //ambil dataakademik get all dari repository
        $akademik = $this->akademikRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the academic dashboard and pass the data using compact()
            return view('dashboard.akademik.dataakademik', compact('auth', 'akademik'));
        } else {
            return view('auth');
        }
    }

    //method tambah data akademik
    public function tambahAkademik(CreateAkademikRequest $request)
    {
        //ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            //ambil dataakademik store dari repository
            $akademik = $this->akademikRepo->store('api', $request);

            // Pengecekan apakah data berhasil disimpan
            if ($akademik) {
                // Buat session flash untuk notifikasi sukses
                Alert::success("Berhasil", "Create User Akademik");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataakademik');
            } else {
                // Buat session flash untuk notifikasi sukses
                Alert::error("Gagal", "Create User Akademik");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataakademik');
            }
        } else {
            return view('auth');
        }
    }

    //method delete data akademik
    public function deleteAkademik($id)
    {
        //ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            //ambil dataakademik delete dari repository
            $akademik = $this->akademikRepo->destroy('api', $id);

            // Pengecekan apakah data berhasil didelete
            if ($akademik) {
                // Buat session flash untuk notifikasi sukses delete
                Alert::success("Berhasil", "Delete User Akademik");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataakademik');
            } else {
                // Buat session flash untuk notifikasi sukses
                Alert::error("Gagal", "Delete User Akademik");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataakademik');
            }
        } else {
            return view('auth');
        }
    }

    //edit data akademik method
    public function updateAkademik(UpdateAkademikRequest $request, $id)
    {
        //ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            //ambil dataakademik update dari repository
            $akademik = $this->akademikRepo->update('api',$request, $id);

            // Pengecekan apakah data berhasil di update
            if ($akademik) {
                // Buat session flash untuk notifikasi sukses delete
                Alert::success("Berhasil", "Update User Akademik");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataakademik');
            } else {
                // Buat session flash untuk notifikasi sukses
                Alert::error("Gagal", "Update User Akademik");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataakademik');
            }
        } else {
            return view('auth');
        }
    }

    //getall data panitia
    public function datapanitia()
    {
        $auth = $this->authRepo->index('web');
        //ambil datapanitia get all dari repository
        $panitia = $this->panitiaRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the datapanitia and pass the data using compact()
            return view('dashboard.akademik.datapanitia', compact('auth', 'panitia'));
        } else {
            return view('auth');
        }
    }

    //method tambah data panitia
    public function tambahPanitia(CreatePanitiaRequest $request)
    {
        //ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            //ambil data panitia store dari repository
            $panitia = $this->panitiaRepo->store('api', $request);

            // Pengecekan apakah data berhasil disimpan
            if ($panitia) {
                // Buat session flash untuk notifikasi sukses
                Alert::success("Berhasil", "Create User Panitia");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datapanitia');
            } else {
                // Buat session flash untuk notifikasi sukses
                Alert::error("Gagal", "Create User Panitia");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datapanitia');
            }
        } else {
            return view('auth');
        }
    }

    //method delete data panitia
    public function deletePanitia($id)
    {
        //ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            //ambil datapanitia delete dari repository
            $panitia = $this->panitiaRepo->destroy('api', $id);

            // Pengecekan apakah data berhasil didelete
            if ($panitia) {
                // Buat session flash untuk notifikasi sukses delete
                Alert::success("Berhasil", "Delete User Panitia");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datapanitia');
            } else {
                // Buat session flash untuk notifikasi sukses
                Alert::error("Gagal", "Delete User Panitia");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datapanitia');
            }
        } else {
            return view('auth');
        }
    }

    //edit data panitia method
    public function updatePanitia(UpdatePanitiaRequest $request, $id)
    {
        //ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            //ambil data panitia update dari repository
            $panitia = $this->panitiaRepo->update('api',$request, $id);

            // Pengecekan apakah data berhasil di update
            if ($panitia) {
                // Buat session flash untuk notifikasi sukses delete
                Alert::success("Berhasil", "Update User Panitia");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datapanitia');
            } else {
                // Buat session flash untuk notifikasi sukses
                Alert::error("Gagal", "Update User Panitia");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datapanitia');
            }
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
            return view('dashboard.akademik.datamahasiswa', compact('auth', 'mahasiswa'));
        } else {
            return view('auth');
        }
    }

    //method tambah data mahasiswa
    public function tambahMahasiswa(CreateMahasiswaRequest $request)
    {
        //ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            //ambil datamahasiswa store dari repository
            $mahasiswa = $this->mahasiswaRepo->store('api', $request);

            // Pengecekan apakah data berhasil disimpan
            if ($mahasiswa) {
                // Buat session flash untuk notifikasi sukses
                Alert::success("Berhasil", "Create User Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datamahasiswa');
            } else {
                // Buat session flash untuk notifikasi gagal
                Alert::error("Gagal", "Create User Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datamahasiswa');
            }
        } else {
            return view('auth');
        }
    }

    //edit data mahasiswa method
    public function updateMahasiswa(UpdateMahasiswaRequest $request, $id)
    {
        //ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            //ambil dataakademik update dari repository
            $akademik = $this->akademikRepo->update('api',$request, $id);

            // Pengecekan apakah data berhasil di update
            if ($akademik) {
                // Buat session flash untuk notifikasi sukses delete
                Alert::success("Berhasil", "Update User Akademik");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataakademik');
            } else {
                // Buat session flash untuk notifikasi sukses
                Alert::error("Gagal", "Update User Akademik");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataakademik');
            }
        } else {
            return view('auth');
        }
    }

    //method delete data mahasiswa
    public function deleteMahasiswa($id)
    {
        //ambil data siapa yang login
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            //ambil datamahasiswa delete dari repository
            $mahasiswa = $this->mahasiswaRepo->destroy('api', $id);

            // Pengecekan apakah data berhasil didelete
            if ($mahasiswa) {
                // Buat session flash untuk notifikasi sukses delete
                Alert::success("Berhasil", "Delete User Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datamahasiswa');
            } else {
                // Buat session flash untuk notifikasi sukses
                Alert::error("Gagal", "Delete User Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('datamahasiswa');
            }
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa tidak verifikasi
    public function dataverifikasimahasiswa()
    {
        $auth = $this->authRepo->index('web');
        //ambil datamahasiswa get all dari repository
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the datamahasiswa and pass the data using compact()
            return view('dashboard.akademik.dataverifikasi', compact('auth', 'mahasiswa'));
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
            //ambil datamahasiswa verifikasi dari repository
            $mahasiswa = $this->mahasiswaRepo->destroy('api', $id);

            // Pengecekan apakah data berhasil di verifikasi
            if ($mahasiswa) {
                // Buat session flash untuk notifikasi sukses delete
                Alert::success("Berhasil", "Verifikasi Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataverifikasimahasiswa');
            } else {
                // Buat session flash untuk notifikasi sukses
                Alert::error("Gagal", "Verifikasi Mahasiswa");

                // Redirect ke halaman yang diinginkan
                return redirect()->route('dataverifikasimahasiswa');
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
            return view('dashboard.akademik.datagagalsidang', compact('auth', 'mahasiswa'));
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa untuk halaman data lolos sidang mahasiswa
    public function datalolossidang()
    {
        $auth = $this->authRepo->index('web');
        //ambil datamahasiswa get all dari repository
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status login true
        if ($auth['status']) {
            // Redirect to the datalolossidang and pass the data using compact()
            return view('dashboard.akademik.datalolossidang', compact('auth', 'mahasiswa'));
        } else {
            return view('auth');
        }
    }

    //getall data mahasiswa untuk halaman jadwal pengambilan ijazah
    public function datapengambilanijazah()
    {
        $auth = $this->authRepo->index('web');
        //ambil datamahasiswa get all dari repository
        $mahasiswa = $this->mahasiswaRepo->index('web');

        // Jika status login true
        if ($auth['status']) {
            // Redirect to the datamahasiswa and pass the data using compact()
            return view('dashboard.akademik.datapengambilanijazah', compact('auth', 'mahasiswa'));
        } else {
            return view('auth');
        }
    }

    protected function generateSanctumToken($user)
    {
        $token = $user->createToken('api-token')->plainTextToken;
        return $token;
    }

}
