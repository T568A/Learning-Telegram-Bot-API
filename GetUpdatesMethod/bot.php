#!/usr/bin/env php
<?php
declare(strict_types = 1);

use Bot\App\{
    Query, Message
};

require_once __DIR__ . '/bootstrap/autoload.php';

$token = require_once __DIR__ . '/token.php';
$citations = require_once __DIR__ . '/citations.php';

$updateId = 0;

$message = [
    '/start' => 'Start!',
    '/help' => 'Relax',
    '/settings' => 'oops, is not ready yet',
    '/random' => $citations
];

try {
    while (true) {
        $requests = Query::getMethod($token, '/getUpdates', '?offset=' . $updateId);
        if ($requests->ok === true && !empty($requests->result)) {
            $updateId = end($requests->result)->update_id + 1;
            Message::sendMessage($token, $requests, $message);
        }
        sleep(15);
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
