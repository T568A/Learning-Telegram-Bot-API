#!/usr/bin/env php
<?php
declare(strict_types = 1);

use Bot\App\{Query, Message};

require_once __DIR__ . '/bootstrap/autoload.php';

$config = require_once __DIR__ . '/config.php';
$token = $config['token'];
$updateId = 0;

try {
    while (true) {
        $requests = (new Query($token, '/getUpdates', '?offset=' . $updateId))->getMethod();
        if ($requests->ok === true && !empty($requests->result)) {
            $updateId = (end($requests->result))->update_id + 1;
            Message::sendMessage($token, $requests);
        }
        sleep(15);
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
