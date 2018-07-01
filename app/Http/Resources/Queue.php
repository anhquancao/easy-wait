<?php

namespace App\Http\Resources;

use App\Repositories\QueueUserRepositoryInterface;
use Illuminate\Http\Resources\Json\JsonResource;
use Tymon\JWTAuth\Facades\JWTAuth;

class Queue extends JsonResource
{

    protected $queueUserRepository;

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->queueUserRepository = app()->make(QueueUserRepositoryInterface::class);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $user = JWTAuth::authenticate();
        $queueUser = $this->queueUserRepository->findByUserIdAndQueueId($user->id, $this->id);
        return [
            "id" => $this->id,
            "name" => $this->name,
            "status" => $queueUser != null ? $queueUser->status : "unregistered",
            "user" => new User($this->user),
            "number_waiting_people" => $this->number_waiting_people,
            "estimate_waiting_time" => $this->tini,
            "created_at" => strtotime($this->created_at),
            "updated_at" => strtotime($this->updated_at)
        ];
    }
}
