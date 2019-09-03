<?php

require_once 'class/ClassGoip.php';
require_once 'class/configGoip.php';

$goipLine=$argv[1];
$num=$argv[2];

$sql="SELECT host,port,password FROM goip where name = $goipLine";

$mysqli = new mysqli($dbhost, $dbuser, $dbpw, $dbname);
if ($mysqli->connect_errno) {
    echo "Номер ошибки: " . $mysqli->connect_errno . "\n";
    echo "Ошибка: " . $mysqli->connect_error . "\n";
    exit;
}

if (!$result = $mysqli->query($sql)) {
    // О нет! запрос не удался. 
    echo "Извините, возникла проблема в работе сайта.";
    echo "Ошибка: Наш запрос не удался и вот почему: \n";
    echo "Запрос: " . $sql . "\n";
    echo "Номер ошибки: " . $mysqli->errno . "\n";
    echo "Ошибка: " . $mysqli->error . "\n";
    exit;
}
if ($result->num_rows === 0) {
    echo "Мы не смогли найти совпадение для $goipLine, простите. Пожалуйста, попробуйте еще раз.";
    exit;
}
 
$ipPortArray = $result->fetch_assoc();
echo "ip: " . $ipPortArray['host'] . ", port:" . $ipPortArray['port']. "\n";
$result->free();
$mysqli->close();



$obj = new classGoip();
$obj->goip_server=$goipdocker;
$obj->goipcronport=$goipcronport;
$recvid=time();
$goip_host=$ipPortArray['host'];
$goip_port=$ipPortArray['port'];
$goip_pwd=$ipPortArray['password'];

echo $obj->setCallFW($recvid, $mode = 3, $reason = 0, $num, $goip_host, $goip_port, $goip_pwd, $ftime = 0);
