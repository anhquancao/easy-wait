<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\QueueUser as QueueUserResource;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Repositories\QueueUserRepositoryInterface;

class QueueUserApiController extends ApiController
{
    protected $queueUserRepository;

    public function __construct(QueueUserRepositoryInterface $queueUserRepository)
    {
        parent::__construct();
        $this->queueUserRepository = $queueUserRepository;
    }
}