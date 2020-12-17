<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Monolog\Handler\LogglyHandler;
use Monolog\Formatter\LogglyFormatter;
use Monolog\Logger;

$log = new Logger('corePhp');
$log->pushHandler(new LogglyHandler('<TOKEN>/tag/monolog', Logger::INFO));

$log->info('test logs to loggly');

echo 'done';