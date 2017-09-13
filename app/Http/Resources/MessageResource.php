<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;


/**
 * Class Message
 * @package App\Http\Resources
 */
class MessageResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'uid'         => $this->uid,
            'sender'      => $this->sender,
            'subject'     => $this->subject,
            'message'     => $this->message,
            'time_sent'   => $this->time_sent->timestamp,
            'is_read'     => $this->is_read,
            'is_archived' => $this->is_archived,
            'links'       => [
                'self' => route('api.message.show', $this->uid)
            ],
        ];
    }
}
