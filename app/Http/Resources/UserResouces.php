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
    public function toArray($messages, $request, $token, $role)
    {
        return [
            'messages' => $messages,
            'nama' => $this->nama,
            'nomor_identitas' => $this->nama,

        ];
    }
}
