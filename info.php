<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

require __DIR__ . '/vendor/autoload.php';

use Monolog\Handler\LogglyHandler;
use Monolog\Formatter\LogglyFormatter;
use Monolog\Logger;

$message = 'PT Info ' . (new \DateTime())->format('Y-m-d g:i a');
$log = new Logger('PTCorePhp');
$log->pushHandler(new LogglyHandler('bb036243-0e81-4166-83e0-b28cfb0996ad/tag/pt', Logger::INFO));    
$log->info($message);
?>