<?php

namespace App;

class QueueUser extends UuidModel
{
    protected $table = 'queue_user';

    protected $fillable = [
        'user_id', 'queue_id', 'order', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function queue()
    {
        return $this->belongsTo(Queue::class, "queue_id");
    }
}
