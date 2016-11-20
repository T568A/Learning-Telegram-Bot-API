#!/usr/bin/env php
<?php
declare(strict_types = 1);

use Bot\App\Update;

require_once __DIR__ . '/bootstrap/autoload.php';

$config = require_once __DIR__ . '/config.php';

try {
    $obj = (new Update('https://api.telegram.org/bot' . $config['token'] . '/getUpdates'))->getUpdates();
    if ($obj->ok) {
        foreach ($obj->result as $value) {
            echo 'chatID: ' . $value->message->chat->id . PHP_EOL;
            echo 'name: ' . $value->message->from->first_name . PHP_EOL;
            echo 'text: ' . $value->message->text . PHP_EOL;
            echo 'date: ' . $value->message->date . PHP_EOL;
            echo '-----------------------' . PHP_EOL;
        }
    } else {
        throw new \Exception('FAIL!(main)');
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
