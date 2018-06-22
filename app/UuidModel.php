<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UuidModel extends Model
{
    protected $table = 'queues';

    protected $casts = [
        'id' => 'string',
    ];
    protected $primaryKey = "id";

    protected $fillable = [
        'name', 'status'
    ];
}
