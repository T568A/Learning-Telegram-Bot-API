<?php
declare(strict_types = 1);

namespace Bot\App;

use Bot\App\Query;

class Message
{
    public static function sendMessage($token, $requests, $message)
    {
        foreach ($requests->result as $value) {
            if ($value->message->text === '/start') {
                if (Query::getMethod($token, '/sendMessage', '?chat_id=' . $value->message->chat->id . '&text=' . $message['/start'])->ok !== true) {
                    // TODO: add logging
                    echo 'start - FAIL!';
                }
            } else if ($value->message->text === '/help') {
                if (Query::getMethod($token, '/sendMessage', '?chat_id=' . $value->message->chat->id . '&text=' . $message['/help'])->ok !== true) {
                    // TODO: add logging
                    echo 'help - FAIL!';
                }
            } else if ($value->message->text === '/settings') {
                if (Query::getMethod($token, '/sendMessage', '?chat_id=' . $value->message->chat->id . '&text=' . $message['/settings'])->ok !== true) {
                    // TODO: add logging
                    echo 'settings - FAIL!';
                }
            }
        }
    }
}
