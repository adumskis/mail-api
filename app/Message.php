<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * @package App
 * @property $uid         integer
 * @property $sender      string
 * @property $subject     string
 * @property $message     string
 * @property $time_send   Carbon
 * @property $is_read     bool
 * @property $is_archived bool
 */
class Message extends Model
{
    // Changed primary key to match sample data structure
    protected $primaryKey = 'uid';

    protected $fillable = ['sender', 'subject', 'message', 'time_sent', 'is_read', 'is_archived'];

    public $timestamps = false;

    protected $dates = [
        'time_sent',
    ];

    public function scopeArchived($query)
    {
        return $query->where('is_archived', 1);
    }

    /**
     * @param bool $is_read
     * @return int
     */
    public function updateIsRead($is_read = true)
    {
        if ((boolean)$is_read === true) {
            $this->is_read = 1;
        } else {
            $this->is_read = 0;
        }
        $this->save();

        return $this->is_read;
    }

    /**
     * @param bool $is_archived
     * @return int
     */
    public function updateIsArchived($is_archived = true)
    {
        if ((boolean)$is_archived === true) {
            $this->is_archived = 1;
        } else {
            $this->is_archived = 0;
        }
        $this->save();

        return $this->is_archived;
    }
}
