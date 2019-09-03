<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 07.08.18
 * Time: 15:07
 * class for control simbank and goip
 * reboot line, reboot bank, reboot goip, check goip line
 */


//use \app\models\scheduler\ClassPack;
namespace app\models\scheduler;

//require_once 'ClassPack.php';
use app\models\scheduler\ClassPack;
//use app\models\scheduler\ClassScheduler;


class classScheduler extends  classPack
{


    public function rebootBank($bankName)
    {
        $send[] = parent::my_pack2(MACHINE_REBOOT, $bankName, TYPE_SIM);
        return parent::sendto_xchanged($send);
    }

    public function rebootGoip($goipName)
    {
        $send[] = parent::my_pack2(MACHINE_REBOOT, $goipName, TYPE_GOIP);
        return parent::sendto_xchanged($send);
    }

    public function rebootGoipLine($goipLine)
    {
        $send[] = parent::my_pack2(MODULE_REBOOT, $goipLine);
        return parent::sendto_xchanged($send);
    }
    /*
     *
     * not tested!!!!
     *
     */
    public function simAwaken($simName)
    {
        $send[] = parent::my_pack2(DEV_ACTIVING, $simName, TYPE_SIM);
        
        return parent::sendto_xchanged($send);
    }
    /*
     * disable sim slot in sim bank
     * @param string - sim line number
     * @return string - status
     */
    public function disableSim($simName)
    {
//        $sql="update sim set dev_disable=1 where sim_name=$simName";
//        $res=$this->updateSchedulerTable($sql);
//
//        if ( $res !== (int) 1) {
//            echo "error update sql $simName: $res\n$sql\n";
//            die;
//        }
//        echo DEV_DISABLE;die;

        $send[] = parent::my_pack2(DEV_DISABLE, $simName, TYPE_SIM);
        $send[] = parent::my_pack2(DEV_BINDING, $simName, 0);
        return parent::sendto_xchanged($send);

    }
    /*
     * enable sim slot in sim bank
     * @param string - sim line number
     * @return string - status
     */
    public function enableSim($simName)
    {
//        $sql="update sim set dev_disable=0 where sim_name=$simName";
//        $res=$this->updateSchedulerTable($sql);
//        if ( $res !== (int) 1) {
//            echo "error update sql $simName: $res\n$sql\n";
//            die;
//        }

        $send[] = parent::my_pack2(DEV_ENABLE, $simName, TYPE_SIM);
        $send[] = parent::my_pack2(DEV_BINDING, $simName, 0);
        return parent::sendto_xchanged($send);

    }

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
    public function netCheck($line_name)
    {
        global $phpsvrport;
        global $smbdocker;

        $timer = 2;
        $timeout = 7;

        $sendbuf = parent::my_pack2(DEV_NETCHECK, $line_name, TYPE_GOIP);

        if (($socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)) <= 0) {
            return "socket_create() failed: reason: " . socket_strerror($socket);
            exit;
        }
        $socks[] = $socket;

        if (socket_sendto($socket, $sendbuf, strlen($sendbuf), 0, $smbdocker, $phpsvrport) === false) {
            echo "sendto error";
        }

        for ($i = 0; $i < 2; $i++) {
            $read = array($socket);
            $err = socket_select($read, $write = NULL, $except = NULL, 5);

            if ($err > 0) {
                if (($n = @socket_recvfrom($socket, $buf, 1024, 0, $ip, $port)) == false) {
                    continue;
                } else {
                    if ($buf == $sendbuf) {
                        $flag = 1;
                        break;
                    }
                }
            }
        }
        if (!$flag) {
            return "Mydify Success,but cannot get response from process named 'xchange' or 'scheduler'. please check process.";
            die;
        }


        for (; ;) {
            $read = $socks;
            flush();
            $err = socket_select($read, $write = NULL, $except = NULL, $timeout);
            if ($err === false) {
                echo "select error!";
            } elseif ($err == 0) {
                if (--$timer <= 0) {
                    return "timeout!";
                    break;
                }
            } else {
                if (($n = @socket_recvfrom($socket, $buf, 1024, 0, $ip, $port1)) == false) {
                    //echo("recvform error".socket_strerror($ret)."<br>");
                    continue;
                }
                return parent::my_unpack_net_check($buf);
//                $data[delay] = floor($data[delay]) / 1000;
//                return "Line Name:$data[sid]\nsent:$data[sent] recv:$data[recv] lost:$data[lost] bad:$data[bad] dup:$data[dup] daley:$data[delay]ms'";
                break;
            }
        }

    }

    public function updateSchedulerTable($sql)
    {
        global $dbhost;
        global $dbuser;
        global $dbpw;
        global $dbname;

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
