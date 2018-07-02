<?php

/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/18/18
 * Time: 4:13 PM
 */

namespace App\Repositories;

use App\Queue;
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

    public function findByUserIdAndQueueIdAnhStatus($userId, $queueId, $status)
    {
        return QueueUser::where('queue_id', $queueId)
            ->where('user_id', $userId)
            ->where('status', $status)
            ->first();
    }

    public function addUserToQueue($userId, $queueId)
    {
        $queue = Queue::find($queueId);


        if ($queue->current_queue_user_id == null) {
            $queueUser = $this->create([
                "queue_id" => $queueId,
                "user_id" => $userId,
                "status" => QueueUser::REGISTERED,
                "estimate_waiting_time" => $queue->tini
            ]);
        } else {

        }


    }
}