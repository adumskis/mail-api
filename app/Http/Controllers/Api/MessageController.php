<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MessageResource;
use App\Message;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        // Used pagination to get links and limit collection size
        $messages = Message::paginate();

        return MessageResource::collection($messages);
    }

    public function show($uid)
    {
        $message = Message::findOrFail($uid);

        return new MessageResource($message);
    }

    public function archived()
    {
        $messages = Message::archived()->paginate();

        return MessageResource::collection($messages);
    }

    public function read($uid)
    {
        $message = Message::findOrFail($uid);

        /*
        * Created and used method updateIsRead to have ability change additional data
        * with `is_read` parameter
        * For example: message could have `read_at` field with timestamp when message was read
        */
        $message->updateIsRead();

        return new MessageResource($message);
    }

    public function archive($uid)
    {
        $message = Message::findOrFail($uid);

        // Similar to updateIsRead method
        $message->updateIsArchived();

        return new MessageResource($message);
    }

}
