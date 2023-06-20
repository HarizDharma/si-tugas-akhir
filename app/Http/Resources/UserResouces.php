<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResouces extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'nomor_identitas' => $this->nomor_identitas,
            'role' => $this->role,
            'username' => $this->username,
            'mahasiswa_id' => $this->when($this->role == 'mahasiswa', function () {
                return MahasiswaResources::make($this->mahasiswa);
            }),
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,


        ];
    }
}
