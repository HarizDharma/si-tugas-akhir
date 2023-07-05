<?php

namespace App\Http\Requests\Mahasiswa;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'skripsi' => 'nullable|file|mimes:pdf|max:2048',
            'laporan' => 'nullable|file|mimes:pdf|max:2048',
        ];

        // Cek apakah validasi panitia sudah dilakukan
        if ($this->validasiPanitiaSelesai()) {
            $rules['surat_keterangan'] = 'nullable|file|mimes:pdf|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'skripsi.file' => 'Skripsi harus berupa file.',
            'skripsi.mimes' => 'Skripsi harus dalam format PDF.',
            'skripsi.max' => 'Skripsi tidak boleh lebih dari 2MB.',

            'laporan.file' => 'Laporan harus berupa file.',
            'laporan.mimes' => 'Laporan harus dalam format PDF.',
            'laporan.max' => 'Laporan tidak boleh lebih dari 2MB.',

            'surat_keterangan.file' => 'Surat keterangan harus berupa file.',
            'surat_keterangan.mimes' => 'Surat keterangan harus dalam format PDF.',
            'surat_keterangan.max' => 'Surat keterangan tidak boleh lebih dari 2MB.',
        ];
    }

    private function validasiPanitiaSelesai()
    {
        // Lakukan pengecekan pada tabel verifikasi
        // Misalnya, jika terdapat baris verifikasi dengan validasi_panitia bernilai true, maka kembalikan true
        // Jika belum ada validasi_panitia yang selesai, kembalikan false
        // Anda dapat menyesuaikan logika pengecekan ini sesuai dengan implementasi Anda
    }
}
