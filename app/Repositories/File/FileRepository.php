<?php

namespace App\Repositories\File;

use App\Http\Resources\ResponseResource;
use App\Http\Resources\UserResouces;
use App\Models\File;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function Symfony\Component\String\s;

class FileRepository implements FileRepositoryInterface
{
    public function index($platform = 'api')
    {
        if (Auth::check()) {
            $user = Auth::user();


            $mahasiswa = User::whereHas('roles', function ($query) {
                $query->where('role', 'mahasiswa');
            })->get();

            return $platform == 'web' ?
                formatResponseResource(true, 'List User Mahasiswa', formatMahasiswaResource($mahasiswa), $user->token)
                : new ResponseResource(true, 'List User Mahasiswa', UserResouces::collection($mahasiswa));

        } else {
            // Jika pengguna belum terautentikasi, kirim respons error
            return $platform == 'web' ?
                formatResponseResource(false, 'Unauthorized, Please Login')
                : new ResponseResource(false, 'Unauthorized, Please Login');

        }
    }

    public function show($id, $platform = 'api')
    {

    }

    public function update($id, Request $request, $platform = 'api')
    {
        $mahasiswa = Mahasiswa::whereHas('file', function ($query) use ($id) {
            $query->where('id', $id);
        })->with(['users', 'file'])
            ->first();

        $file = File::find($id);

        if ($request->has('file_skkm')) {
            $user = $mahasiswa->users->first();

            $file_upload = $request->file('file_skkm');
            // Get the original file name
            $fileName = $file_upload->getClientOriginalName();

            // Remove the existing file if it exists
            if (!empty($file->skkm) && Storage::exists('public/uploads/mahasiswa' . $file->skkm)) {
                Storage::delete('public/uploads/mahasiswa' . $file->skkm);
            }

            // Concatenate the user's "nomor_identitas" with the file name
            $fileName = $user->nomor_identitas . '_'.rand(0,9999). '_' . $fileName;
            $file_upload->storeAs('public/uploads/mahasiswa', $fileName);

            // Update the "skkm" filename in the database record if necessary
            $file->update(['skkm' => $fileName]);
        }
        if ($request->has('file_skla')) {
            $user = $mahasiswa->users->first();

            $file_upload = $request->file('file_skla');
            // Get the original file name
            $fileName = $file_upload->getClientOriginalName();

            // Remove the existing file if it exists
            if (!empty($file->skla) && Storage::exists('public/uploads/mahasiswa' . $file->skla)) {
                Storage::delete('public/uploads/mahasiswa' . $file->skla);
            }

            // Concatenate the user's "nomor_identitas" with the file name
            $fileName = $user->nomor_identitas . '_'.rand(0,9999). '_' . $fileName;
            $file_upload->storeAs('public/uploads/mahasiswa', $fileName);

            // Update the "skla" filename in the database record if necessary
            $file->update(['skla' => $fileName]);
        }
        if ($request->has('file_kartu_kendali_skripsi')) {
            $user = $mahasiswa->users->first();

            $file_upload = $request->file('file_kartu_kendali_skripsi');
            // Get the original file name
            $fileName = $file_upload->getClientOriginalName();

            // Remove the existing file if it exists
            if (!empty($file->kartu_kendali_skripsi) && Storage::exists('public/uploads/mahasiswa' . $file->kartu_kendali_skripsi)) {
                Storage::delete('public/uploads/mahasiswa' . $file->kartu_kendali_skripsi);
            }

            // Concatenate the user's "nomor_identitas" with the file name
            $fileName = $user->nomor_identitas . '_'.rand(0,9999). '_' . $fileName;
            $file_upload->storeAs('public/uploads/mahasiswa', $fileName);

            // Update the "skla" filename in the database record if necessary
            $file->update(['kartu_kendali_skripsi' => $fileName]);
        }
        if ($request->has('file_draft_artikel_ilmiah')) {
            $user = $mahasiswa->users->first();

            $file_upload = $request->file('file_draft_artikel_ilmiah');
            // Get the original file name
            $fileName = $file_upload->getClientOriginalName();

            // Remove the existing file if it exists
            if (!empty($file->bukti_jurnal) && Storage::exists('public/uploads/mahasiswa' . $file->bukti_jurnal)) {
                Storage::delete('public/uploads/mahasiswa' . $file->bukti_jurnal);
            }

            // Concatenate the user's "nomor_identitas" with the file name
            $fileName = $user->nomor_identitas . '_'.rand(0,9999). '_' . $fileName;
            $file_upload->storeAs('public/uploads/mahasiswa', $fileName);

            // Update the "skla" filename in the database record if necessary
            $file->update(['bukti_jurnal' => $fileName]);
        }
        if ($request->has('file_surat_keterangan_bebas_pkl')) {
            $user = $mahasiswa->users->first();

            $file_upload = $request->file('file_surat_keterangan_bebas_pkl');
            // Get the original file name
            $fileName = $file_upload->getClientOriginalName();

            // Remove the existing file if it exists
            if (!empty($file->bebas_pkl) && Storage::exists('public/uploads/mahasiswa' . $file->bebas_pkl)) {
                Storage::delete('public/uploads/mahasiswa' . $file->bebas_pkl);
            }

            // Concatenate the user's "nomor_identitas" with the file name
            $fileName = $user->nomor_identitas . '_'.rand(0,9999). '_' . $fileName;
            $file_upload->storeAs('public/uploads/mahasiswa', $fileName);

            // Update the "skla" filename in the database record if necessary
            $file->update(['bebas_pkl' => $fileName]);
        }
        if ($request->has('file_skripsi')) {
            $user = $mahasiswa->users->first();

            $file_upload = $request->file('file_skripsi');
            // Get the original file name
            $fileName = $file_upload->getClientOriginalName();

            // Remove the existing file if it exists
            if (!empty($file->laporan_skripsi) && Storage::exists('public/uploads/mahasiswa' . $file->laporan_skripsi)) {
                Storage::delete('public/uploads/mahasiswa' . $file->laporan_skripsi);
            }

            // Concatenate the user's "nomor_identitas" with the file name
            $fileName = $user->nomor_identitas . '_'.rand(0,9999). '_' . $fileName;
            $file_upload->storeAs('public/uploads/mahasiswa', $fileName);

            // Update the "skla" filename in the database record if necessary
            $file->update(['laporan_skripsi' => $fileName]);
        }


        if ($request->has('toeic')) {
            $user = $mahasiswa->users->first();

            $file_upload = $request->file('toeic');
            // Get the original file name
            $fileName = $file_upload->getClientOriginalName();

            // Remove the existing file if it exists
            if (!empty($file->sertifikat_toeic) && Storage::exists('public/uploads/mahasiswa' . $file->sertifikat_toeic)) {
                Storage::delete('public/uploads/mahasiswa' . $file->sertifikat_toeic);
            }

            // Concatenate the user's "nomor_identitas" with the file name
            $fileName = $user->nomor_identitas . '_'.rand(0,9999). '_' . $fileName;
            $file_upload->storeAs('public/uploads/mahasiswa', $fileName);

            // Update the "skla" filename in the database record if necessary
            $file->update(['sertifikat_toeic' => $fileName]);
        }
        if ($request->has('pengumpulan_alat')) {
            $user = $mahasiswa->users->first();

            $file_upload = $request->file('pengumpulan_alat');
            // Get the original file name
            $fileName = $file_upload->getClientOriginalName();

            // Remove the existing file if it exists
            if (!empty($file->pengumpulan_alat) && Storage::exists('public/uploads/mahasiswa' . $file->pengumpulan_alat)) {
                Storage::delete('public/uploads/mahasiswa' . $file->pengumpulan_alat);
            }

            // Concatenate the user's "nomor_identitas" with the file name
            $fileName = $user->nomor_identitas . '_'.rand(0,9999). '_' . $fileName;
            $file_upload->storeAs('public/uploads/mahasiswa', $fileName);

            // Update the "skla" filename in the database record if necessary
            $file->update(['pengumpulan_alat' => $fileName]);
        }
        if ($request->has('laporan_pkl')) {
            $user = $mahasiswa->users->first();

            $file_upload = $request->file('laporan_pkl');
            // Get the original file name
            $fileName = $file_upload->getClientOriginalName();

            // Remove the existing file if it exists
            if (!empty($file->laporan_pkl) && Storage::exists('public/uploads/mahasiswa' . $file->laporan_pkl)) {
                Storage::delete('public/uploads/mahasiswa' . $file->laporan_pkl);
            }

            // Concatenate the user's "nomor_identitas" with the file name
            $fileName = $user->nomor_identitas . '_'.rand(0,9999). '_' . $fileName;
            $file_upload->storeAs('public/uploads/mahasiswa', $fileName);

            // Update the "skla" filename in the database record if necessary
            $file->update(['laporan_pkl' => $fileName]);
        }

        if ($request->has('proposal_laporan_sempro')) {
            $user = $mahasiswa->users->first();

            $file_upload = $request->file('proposal_laporan_sempro');
            // Get the original file name
            $fileName = $file_upload->getClientOriginalName();

            // Remove the existing file if it exists
            if (!empty($file->laporan_pkl) && Storage::exists('public/uploads/mahasiswa' . $file->proposal_laporan_sempro)) {
                Storage::delete('public/uploads/mahasiswa' . $file->proposal_laporan_sempro);
            }

            // Concatenate the user's "nomor_identitas" with the file name
            $fileName = $user->nomor_identitas . '_'.rand(0,9999). '_' . $fileName;
            $file_upload->storeAs('public/uploads/mahasiswa', $fileName);

            // Update the "skla" filename in the database record if necessary
            $file->update(['proposal_laporan_sempro' => $fileName]);
        }
        if ($request->has('form_perstujuan_sempro')) {
            $user = $mahasiswa->users->first();

            $file_upload = $request->file('form_perstujuan_sempro');
            // Get the original file name
            $fileName = $file_upload->getClientOriginalName();

            // Remove the existing file if it exists
            if (!empty($file->laporan_pkl) && Storage::exists('public/uploads/mahasiswa' . $file->form_perstujuan_sempro)) {
                Storage::delete('public/uploads/mahasiswa' . $file->form_perstujuan_sempro);
            }

            // Concatenate the user's "nomor_identitas" with the file name
            $fileName = $user->nomor_identitas . '_'.rand(0,9999). '_' . $fileName;
            $file_upload->storeAs('public/uploads/mahasiswa', $fileName);

            // Update the "skla" filename in the database record if necessary
            $file->update(['form_perstujuan_sempro' => $fileName]);
        }



        return $file;
    }
}

