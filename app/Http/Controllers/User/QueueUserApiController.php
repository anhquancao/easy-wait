<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
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