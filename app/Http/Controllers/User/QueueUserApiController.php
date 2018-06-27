<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Repositories\QueueUserRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\QueueRepositoryInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class QueueUserApiController extends ApiController
{
    protected $queueUserRepository;

    protected $queueRepository;

    public function __construct(QueueUserRepositoryInterface $queueUserRepository, QueueRepositoryInterface $queueRepository)
    {
        parent::__construct();
        $this->queueUserRepository = $queueUserRepository;
        $this->queueRepository = $queueRepository;
    }

    public function hello(Request $request)
    {
        if (!$this->queueRepository->checkExist($request->queue_id))
            return $this->badRequest(["message" => "Queue doesn't exist"]);

        $this->queueUserRepository->create([
            "queue_id" => $request->queue_id,
            "user_id" => JWTAuth::authenticate()->id,
        ]);

        return $this->success(["message" => "success"]);
    }
}