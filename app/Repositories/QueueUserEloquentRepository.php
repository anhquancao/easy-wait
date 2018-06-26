<?php

/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/18/18
 * Time: 4:13 PM
 */

namespace App\Repositories;


use App\Http\Resources\QueueUser as QueueUserResource;
use Illuminate\Database\QueryException;
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
}