<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Repositories\Auth\AuthRepositoryInterface;
use App\Repositories\File\FileRepositoryInterface;
use App\Repositories\Mahasiswa\MahasiswaRepositoryInterface;
use App\Repositories\Panitia\PanitiaRepositoryInterface;
use App\Repositories\Akademik\AkademikRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class WebMahasiswaController extends Controller
{
    //deklarasi untuk menmpung repository mahasiswa,panitia dan akademik
    private $akademikRepo;
    private $panitiaRepo;
    private $authRepo;
    private $mahasiswaRepo;
    private $fileRepo;
    public function __construct(AkademikRepositoryInterface $akademikRepo,
                                PanitiaRepositoryInterface $panitiaRepo,
                                FileRepositoryInterface $fileRepository,
                                MahasiswaRepositoryInterface $mahasiswaRepo,
                                AuthRepositoryInterface $authRepo)
    {
        //manggil repo lalu dimasukkan ke var private diatas
        $this->akademikRepo = $akademikRepo;
        $this->panitiaRepo = $panitiaRepo;
        $this->mahasiswaRepo = $mahasiswaRepo;
        $this->authRepo = $authRepo;
        $this->fileRepo = $fileRepository;
    }

    //index plus pengecekan login
    public function index()
    {
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the academic dashboard
            return view('dashboard.mahasiswa.index', compact('auth'));
        } else {
            return view('auth');
        }
    }

    //getall halama pendaftaran
    public function pendaftaranmahasiswa()
    {
        $auth = $this->authRepo->index('web');
        $mahasiswa = $this->mahasiswaRepo->getSelf( 'api');
        $upload = File::find($mahasiswa->mahasiswa->file_id);

        if($upload) {
            if($upload->skkm && $upload->skla && $upload->kartu_kendali_skripsi
                && $upload->bukti_jurnal && $upload->bebas_pkl && $upload->laporan_skripsi ) {
                $mahasiswa->mahasiswa->update(['status_id' => 2]);
            }
        }
        $upload = File::find($mahasiswa->mahasiswa->file_id);

        // Jika status true
        if ($auth['status']) {
            // Redirect to the academic dashboard and pass the data using compact()
            return view('dashboard.mahasiswa.pendaftaranmahasiswa', compact('auth', 'upload'));
        } else {
            return view('auth');
        }
    }

    //getall halama form bebas tanggungan
    public function bebastanggungan()
    {
        $auth = $this->authRepo->index('web');

        // Jika status true
        if ($auth['status']) {
            // Redirect to the academic dashboard and pass the data using compact()
            return view('dashboard.mahasiswa.formbebastanggungan', compact('auth'));
        } else {
            return view('auth');
        }
    }

    public function uploadFile($id, Request $request) {
        $auth = $this->authRepo->index('web');
        $mahasiswa = $this->mahasiswaRepo->getSelf( 'api');


        $upload = $this->fileRepo->update($mahasiswa->mahasiswa->file_id,  $request);
        if($upload) {
            if($upload->skkm && $upload->skla && $upload->kartu_kendali_skripsi
                && $upload->bukti_jurnal && $upload->bebas_pkl && $upload->laporan_skripsi ) {
                $mahasiswa->mahasiswa->update(['status_id' => 2]);
            }
        }
        Alert::success("Berhasil", "Upload File Pendaftaran");
        return view('dashboard.mahasiswa.pendaftaranmahasiswa', compact('auth','upload'));
    }

    //method uploadfile bebas tanggungan
    public function uploadFileBebasTanggungan($id, Request $request) {
        $auth = $this->authRepo->index('web');
        $mahasiswa = $this->mahasiswaRepo->getSelf( 'api');


        $upload = $this->fileRepo->update($mahasiswa->mahasiswa->file_id,  $request);
        if($upload) {
            if($upload->laporan_pkl && $upload->sertifikat_toeic && $upload->pengumpulan_alat ) {
                // Buat session flash untuk notifikasi sukses upload
                Alert::success("Berhasil", "Upload File Bebas Tanggungan");
            }
        }
        return view('dashboard.mahasiswa.formbebastanggungan', compact('auth','upload'));
    }
    protected function generateSanctumToken($user)
    {
        $token = $user->createToken('api-token')->plainTextToken;
        return $token;
    }


}
