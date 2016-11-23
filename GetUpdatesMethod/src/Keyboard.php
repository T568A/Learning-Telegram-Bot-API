<?php
declare(strict_types = 1);

namespace Bot\App;

class Keyboard
{
    public static function getKeyboard(array $keyboard)
    {
        $resp = [
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => false
        ];

        return $encodedMarkup = json_encode($resp);
    }
}
