<?php

namespace App\Http\Resources;

use App\Models\File;
use App\Models\HasilSidang;
use App\Models\Status;
use App\Models\TahapSidang;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'status' => true,
            'message' => 'Berhasil login',
            'data' => [
                'id' => $this->id,
                'nama' => $this->nama,
                'nomor_identitas' => $this->nomor_identitas,
                'role' => $this->role,
                'username' => $this->username,
                'mahasiswa_id' => $this->when($this->role == 'mahasiswa', function () {
                    return MahasiswaResources::make($this->mahasiswa);
                })
            ],
            'token' => $this->token,
            ];
        }
}
