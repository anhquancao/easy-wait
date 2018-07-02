<?php

namespace App;

class QueueUser extends UuidModel
{
    public const REGISTERED = "registered";
    public const UNREGISTERED = "unregistered";
    public const PROCESSED = "processed";


    protected $table = 'queue_user';

    protected $fillable = [
        'user_id', 'queue_id', 'status', 'estimate_waiting_time',
        'previous_queue_user_id', 'next_queue_user_id'
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
