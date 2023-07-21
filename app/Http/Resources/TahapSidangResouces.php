<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TahapSidangResouces extends JsonResource
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
            'id' => $this->sidang_id,
            'nama_sidang' => $this->nama_sidang,
            'tanggal_sidang' => $this->tanggal_sidang
        ];
    }
}
