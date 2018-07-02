<?php

namespace App\Http\Resources;

use App\Repositories\QueueUserRepositoryInterface;
use Illuminate\Http\Resources\Json\JsonResource;
use Tymon\JWTAuth\Facades\JWTAuth;

class CustomerQueue extends JsonResource
{

    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "tini" => $this->tini,
            "tmoy" => $this->tmoy,
            "trev" => $this->trev,
            "status" => $this->status,
            "user" => new User($this->user),
            "number_waiting_people" => $this->number_waiting_people,
            "estimate_waiting_time" => $this->tini,
            "created_at" => strtotime($this->created_at),
            "updated_at" => strtotime($this->updated_at)
        ];
    }
}
