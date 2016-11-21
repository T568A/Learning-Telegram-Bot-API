<?php
declare(strict_types = 1);

namespace Bot\App;

use Bot\App\Query;

class Message
{
    public function __construct()
    {

    }

    public static function sendMessage($token, $requests)
    {
        foreach ($requests->result as $value) {
            echo 'chatID: ' . $value->message->chat->id . PHP_EOL;
            echo 'name: ' . $value->message->from->first_name . PHP_EOL;
            echo 'text: ' . $value->message->text . PHP_EOL;
            echo 'date: ' . $value->message->date . PHP_EOL;
            echo 'update_id: ' . $value->update_id . PHP_EOL;
            echo '-----------------------' . PHP_EOL;
            if ($value->message->text === '/start') {
                if((new Query($token, '/sendMessage', '?chat_id=' . $value->message->chat->id . '&text=' . 'Start!'))->getMethod()->ok !== true) {
                    // TODO: add logging
                    echo 'start - FAIL!';
                }
            } else if ($value->message->text === '/help') {

                if((new Query($token, '/sendMessage', '?chat_id=' . $value->message->chat->id . '&text=' . 'Help'))->getMethod()->ok !== true) {
                    // TODO: add logging
                    echo 'help - FAIL!';
                }
            } else if ($value->message->text === '/settings') {
                if((new Query($token, '/sendMessage', '?chat_id=' . $value->message->chat->id . '&text=' . 'settings'))->getMethod()->ok !== true) {
                    // TODO: add logging
                    echo 'settings - FAIL!';
                }
            }
        }
    }
}
