<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QueueUser extends JsonResource
{
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
            "user" => new User($this->user),
            "queue" => new Queue($this->queue),
            "order" => $this->order,
            "status" => $this->status,
            "created_at" => strtotime($this->created_at),
            "updated_at" => strtotime($this->updated_at)
        ];
    }
}
