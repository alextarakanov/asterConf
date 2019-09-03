<?php
/*
reboot line on goip
programm line
line: like 2308
*/
require_once 'class/ClassScheduler.php';

$line = $argv[1];

if ( !preg_match("/^\d+$/", $line)) {
    echo "line  '$line' incorrect. It  must be Digits\n";
    die;
}

$objScheduler = new classScheduler();

if ( $objScheduler->rebootGoipLine($line))  {
    echo "ok\n";
} else {
    echo "error\n";
}



