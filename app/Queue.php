<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $table = 'queues';

    protected $fillable = [
        'service_name', 'status', 'max_people_count'
    ];
}
