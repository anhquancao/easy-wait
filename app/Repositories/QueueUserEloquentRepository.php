<?php

/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/18/18
 * Time: 4:13 PM
 */

namespace App\Repositories;

use App\QueueUser;
use App\Http\Resources\QueueUser as QueueUserResource;

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

    public function create(array $attributes)
    {
        $order = QueueUser::where('queue_id', $attributes['queue_id'])->where('status', 'waiting')->max('order') + 1;
        $attributes['order'] = $order;
        $attributes['status'] = 'waiting';
        return $this->_model->create($attributes);
    }
}