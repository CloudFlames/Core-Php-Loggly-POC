<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

// use Monolog\Handler\StreamHandler;
// use Monolog\Logger;

// $logger = new Logger('main');
// $logger->pushHandler(new StreamHandler(__DIR__ . '/error.log', Logger::DEBUG));

// $logger->info('First message');

use Analog\Analog;

Analog::handler (function ($message) {

$headers = array('Content-Type: application/json');

$url = "https://poonkodi.loggly.com/inputs/85253272-4a0f-4c06-870c-df194ed770be";

 

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, "hi");

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_exec($ch);
});

echo 'done';