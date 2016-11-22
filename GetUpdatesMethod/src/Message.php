<?php
declare(strict_types = 1);

namespace Bot\App;

class Message
{

    public static function sendMessage($token, $requests, $message)
    {
        foreach ($requests->result as $obj) {
            $text   = $obj->message->text;
            $chatId = $obj->message->chat->id;

            if ($text === '/start' || $text === 'Start') {
                if (Query::getMethod($token, '/sendMessage', '?chat_id=' . $chatId . '&text=' . $message['/start'] . '&reply_markup=' . Keyboard::getKeyboard())->ok !== true) {
                    // TODO: add logging
                    echo 'start - FAIL!';
                }
            } else if ($text === '/help' || $text === 'Help') {
                if (Query::getMethod($token, '/sendMessage', '?chat_id=' . $chatId . '&text=' . $message['/help'])->ok !== true) {
                    // TODO: add logging
                    echo 'help - FAIL!';
                }
            } else if ($text === '/settings' || $text === 'Settings') {
                if (Query::getMethod($token, '/sendMessage', '?chat_id=' . $chatId . '&text=' . $message['/settings'])->ok !== true) {
                    // TODO: add logging
                    echo 'settings - FAIL!';
                }
            } else if ($text === '/random' || $text === 'Random') {
                $len = count($message['/random']);
                $random = $message['/random'][rand(0, $len - 1)];
                if (Query::getMethod($token, '/sendMessage', '?chat_id=' . $chatId . '&text=' . $random)->ok !== true) {
                    // TODO: add logging
                    echo 'random - FAIL!';
                }
            }
        }
    }
}
