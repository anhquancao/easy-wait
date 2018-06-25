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

    public function getQueue($id)
    {
        return [
            'queue' => new QueueResource(Queue::find($id))
        ];
    }
}