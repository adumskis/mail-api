<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = storage_path('seeds_data/messages_sample.json');
        $content = file_get_contents($filePath);
        // Second parameter set to true to get messages as array, no as stdClass
        $data = json_decode($content, true);
        if (isset($data['messages']) && is_array($data['messages'])) {
            foreach ($data['messages'] as $messageData) {
                $message = new Message($messageData);
                // Message uid is not fillable
                $message->uid = $messageData['uid'];
                $message->save();
            }
        }
    }
}
