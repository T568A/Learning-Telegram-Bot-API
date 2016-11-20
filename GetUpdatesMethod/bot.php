#!/usr/bin/env php
<?php
declare(strict_types = 1);

use Bot\App\Update;

require_once __DIR__ . '/bootstrap/autoload.php';

$config = require_once __DIR__ . '/config.php';

var_dump((new Update('https://api.telegram.org/bot' . $config['token'] . '/getUpdates'))->getUpdates());
