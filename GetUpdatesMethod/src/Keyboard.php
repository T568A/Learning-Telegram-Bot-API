<?php
declare(strict_types = 1);

namespace Bot\App;

class Keyboard
{

    public static function getKeyboard()
    {
        $keyboard = [
            [
                'Start',
                'Settings',
                'Random',
                'Help'
            ]
        ];

        $resp = [
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ];

        return $encodedMarkup = json_encode($resp);

    }
}
