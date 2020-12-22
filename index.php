<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

require __DIR__ . '/vendor/autoload.php';

use Monolog\Handler\LogglyHandler;
use Monolog\Formatter\LogglyFormatter;
use Monolog\Logger;
     
    
    $Datetime = date('Y-m-d H:m:s');
    $to = "vipinarsoft3304@gmail.com";
    $subject = "PR-CRON TEST";
    $txt = "pr cron test... -> Run timing: ".$Datetime;
    $headers = "From: webmaster@example.com";

    $log = new Logger('corePhp');
    $log->pushHandler(new LogglyHandler('<TOKEN>/tag/pt', Logger::INFO));
    
    if(mail($to,$subject,$txt,$headers))
    {
        $log->info('Email sending');
        
        echo 'done';   
    }
    else
    {
        $log->info('Email not sending');
        echo 'not';
    }

?>