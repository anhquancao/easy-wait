<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;

class Queue extends UuidModel
{
    protected $table = 'queues';

    use SoftDeletes;

    protected $fillable = [
        'name', 'status', "user_id",
        'number_waiting_people', "tini", "tmoy", "trev"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function queueUsers()
    {
        return $this->hasMany(QueueUser::class, "queue_id");
    }
}
