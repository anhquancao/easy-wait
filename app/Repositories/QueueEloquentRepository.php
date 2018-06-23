<?php

/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/18/18
 * Time: 4:13 PM
 */

namespace App\Repositories;


use App\Queue;

class QueueEloquentRepository extends EloquentRepository implements QueueRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Queue::class;
    }

    public function getAllQueues($search, $status)
    {
        // $queues = $this->
    }
}