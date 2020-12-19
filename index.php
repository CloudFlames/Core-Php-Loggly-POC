<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Monolog\Handler\LogglyHandler;
use Monolog\Formatter\LogglyFormatter;
use Monolog\Logger;

$ch3 = curl_init();
curl_setopt($ch3, CURLOPT_URL, 'https://pearlthoughts.stoplight.io/mocks/pearlthoughts/api-app-monitoring-mock/4380658/settings/failure');
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, 'GET');
$result = curl_exec($ch3);
if (curl_errno($ch3)) {
    echo 'Error:' . curl_error($ch3);
    $log = new Logger('corePhpDec19');
    $log->pushHandler(new LogglyHandler('eb90235e-db33-4a6a-9203-c3e13e0b4d65/tag/monolog', Logger::ERROR));

    $log->error(curl_error($ch3));
}
curl_close($ch3);
$data=json_decode($result, true); 
if($data['message']) {             
    $log = new Logger('corePhpDec19Success');
    $log->pushHandler(new LogglyHandler('eb90235e-db33-4a6a-9203-c3e13e0b4d65/tag/monolog', Logger::INFO));

    $log->info($data['message']);
}
echo 'done';
