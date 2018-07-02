<?php

/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/18/18
 * Time: 4:13 PM
 */

namespace App\Repositories;


use App\Queue;
use App\Http\Resources\Queue as QueueResource;
use Illuminate\Database\QueryException;

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

    public function getQueues($search, $status)
    {
        $queues = Queue::query();

        if ($search)
            $queues = $queues->where('name', "%$search%");
        if ($status)
            $queues = $queues->where('status', $status);

        return $queues->orderBy('created_at', 'desc')->paginate(20);
    }


    public function findQueuesByCustomerId($id)
    {
        return Queue::where("user_id", $id)->orderBy('created_at', 'desc')->paginate(20);
    }

    public function increment($queueId, $column)
    {
        Queue::where("id", $queueId)->increment($column);
    }

    public function decrement($queueId, $column)
    {
        Queue::where('id', $queueId)->decrement($column);
    }
}