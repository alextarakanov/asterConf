<?php
/*
programm sim_name action
sim_name: like 10031
action: 1 - enable; 0 - disable
*/

require_once 'class/ClassScheduler.php';

$sim_name = $argv[1];
$state = $argv[2];


if (preg_match("/^\d+$/", $sim_name) && preg_match("/^\d+$/", $state)) {

    if ($state == 1) {
        $functionName = 'enableSim';

    } elseif ($state == 0) {
        $functionName = 'disableSim';

    } else {
        echo "state  must be 1 - enable or 0 - disable\n";
        die;
    }

} else {
    echo "sim name - $sim_name  and state - $state must be Digits\n";
    die;
}

$objScheduler = new classScheduler();

if ( $objScheduler->$functionName($sim_name))  {
    echo "ok\n";
} else {
    echo "error\n";
}

