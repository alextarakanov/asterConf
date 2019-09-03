<?php


require_once 'class/configGoip.php';

class classMysql {

    public $dbhost='172.30.0.11';
    public $dbuser='goip';
    public  $dbpw='goip';
    public  $dbname='goip';

    public function mysqlConnect($dbhost, $dbuser, $dbpw, $dbname)
    {

        $connection = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname);
        if (mysqli_connect_errno()) {
            return "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        if ($connection->query($sql) === TRUE) {
            return (int) 1;
        } else {
            return "Error updating record: " . $connection->error;
        }
    }



}

