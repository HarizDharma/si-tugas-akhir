<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResponseResource extends JsonResource
{
    private $status;
    private $message;
    private $code;

    public function __construct($status, $message, $resource = null)
    {
        $this->status = $status;
        $this->message = $message;

        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        $data = $this->resource ? $this->resource : [];

        return [
            'status' => $this->status,
            'message' => $this->message,
            'data' => $data,
        ];
    }
}
