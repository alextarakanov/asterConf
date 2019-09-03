<?php
/*
check line on goip
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

    /*
     * @param string - line number
     * @return array - check status
     *
     * [a]
     * [b]
     * [d]
     * [e]
     * [f]
     * [sid] - goip Line name like 94801
     * [type]
     * [sent] - sent packets
     * [recv] - recived packets
     * [lost] - losts packtets
     * [bad] - bad - package
     * [dup]
     * [g]
     * [h]
     * [delay] - delay/1000 ms
     *
     *
     */


$returnArray=$objScheduler->netCheck($line);
print_r($returnArray);
// if ( $objScheduler->netCheck($line))  {
//     echo "ok\n";
// } else {
//     echo "error\n";
// }



