<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/22/18
 * Time: 4:27 PM
 */

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\ApiController;
use App\Repositories\QueueRepositoryInterface;
use Illuminate\Http\Request;

class QueueApiController extends ApiController
{
    protected $queueRepository;

    public function __construct(QueueRepositoryInterface $queueRepository)
    {
        parent::__construct();
        $this->queueRepository = $queueRepository;
    }

    public function createQueue(Request $request) {

    }

}