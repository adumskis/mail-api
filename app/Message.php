<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // Changed primary key to match sample data structure
    protected $primaryKey = 'uid';

    protected $fillable = ['sender', 'subject', 'message', 'time_sent', 'is_read', 'is_archived'];

    public $timestamps = false;

    protected $dates = [
        'time_sent',
    ];
}
