<?php

/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/18/18
 * Time: 4:13 PM
 */

namespace App\Repositories;

use App\QueueUser;

class QueueUserEloquentRepository extends EloquentRepository implements QueueUserRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return QueueUser::class;
    }

    public function findByUserIdAndQueueId($userId, $queueId)
    {
        return QueueUser::where('queue_id', $queueId)
            ->where('user_id', $userId)
            ->first();
    }
}