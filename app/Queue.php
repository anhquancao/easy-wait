<?php

namespace App;


class Queue extends UuidModel
{
    protected $table = 'queues';

    protected $fillable = [
        'name', 'status'
    ];
}
