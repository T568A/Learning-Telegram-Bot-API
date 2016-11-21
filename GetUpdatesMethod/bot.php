#!/usr/bin/env php
<?php
declare(strict_types = 1);

use Bot\App\{GetMessage};

require_once __DIR__ . '/bootstrap/autoload.php';

$config = require_once __DIR__ . '/config.php';

$updateId = 0;

try {
    while (true) {
        $obj = (new GetMessage('https://api.telegram.org/bot' . $config['token'] . '/getUpdates?offset=' . $updateId))->getUpdates();
        if (is_bool($obj->ok) && $obj->ok) {
            //var_dump($updateId);
            $updateId = (!empty($obj->result)) ? (end($obj->result))->update_id + 1 : $updateId;
            //var_dump($updateId);
            //var_dump($obj);
            foreach ($obj->result as $value) {
                echo 'chatID: ' . $value->message->chat->id . PHP_EOL;
                echo 'name: ' . $value->message->from->first_name . PHP_EOL;
                echo 'text: ' . $value->message->text . PHP_EOL;
                echo 'date: ' . $value->message->date . PHP_EOL;
                echo 'update_id: ' . $value->update_id . PHP_EOL;

                echo '-----------------------' . PHP_EOL;
            }
        }  else {
            throw new \Exception('FAIL!(main)');
        }
        sleep(15);
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
