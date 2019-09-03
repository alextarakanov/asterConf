<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 08.08.18
 * Time: 14:34
 */
// require_once 'classPack.php';

class classGoip
{
    public $goip_server;
    public $goipcronport;
    public $timer = 2;
    public $timeout = 10;


    public function openGoipDialog($recvid, $goip_host, $goip_port)
    {
        ignore_user_abort(true);

        if (($socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)) <= 0) {
            return "socket_create() failed: reason: " . socket_strerror($socket);
            exit;
        }

        for ($i = 0; $i < 3; $i++) {
            $read = array($socket);
            $buf = "START $recvid $goip_host $goip_port\n";
            if (@socket_sendto($socket, $buf, strlen($buf), 0, $this->goip_server, $this->goipcronport) === false) {
                return "sendto error" . socket_strerror($socket);
                die;
            }
            $err = socket_select($read, $write = NULL, $except = NULL, 5);
            if ($err > 0) {
                if (($n = @socket_recvfrom($socket, $buf, 1024, 0, $this->goip_server, $this->goipcronport)) == false) {
                    echo("recvform error" . socket_strerror($n) . "\n");
                    continue;
                } else {
                    if ($buf == "OK") {
                        break;
                    }
                }
            }
        }
        if ($i >= 3) {
            return "Cannot get response from process named \"goipcron\". please check this process";
            die;
        }
        return $socket;
    }

    public function reciveGoipFor($socks, $socket, $sendbuf)
    {
        for (; ;) {
            $read = $socks;
            flush();
            if (count($read) == 0) {
                return "ERROR count read =  $read";
            }

            $err = socket_select($read, $write = NULL, $except = NULL, $this->timeout);

            if ($err === false) {
                return "select error!";

            } elseif ($err == 0) {
                if (--$this->timer <= 0) {
                    return "Timeout! Not get response from Goip";

                }
                if (@socket_sendto($socket, $sendbuf, strlen($sendbuf), 0, $this->goip_server, $this->goipcronport) === false) {
                    echo "sendto error\n";
                }

            } else {
                if (($n = @socket_recvfrom($socket, $buf, 1024, 0, $this->goip_server, $this->goipcronport)) == false) {
                    echo "recvform error" . socket_strerror($n) . "\n";
                    continue;
                } else {
                    return $buf;

                }

            }
        }
    }

    public function closeGoipDialog($recvid)
    {
        $buf = "DONE $recvid";
        if (@socket_sendto($socket, $buf, strlen($buf), 0, $this->goip_server, $this->goipcronport) === false) {
            echo "sendto error\n";
        }
    }

    public function setCallFW($recvid, $mode = 3, $reason = 1, $num, $goip_host, $goip_port, $goip_pwd, $ftime = 0)
    {
        /*
         * reason = 0; Call Forward Unconditional
         * reason = 1; Call Forward Busy
         * reason = 2; Call Forward No Answered
         * reason = 3; Call Forward Out Of Reach
         * reason: type of call forward. 0: unconditional，1: busy，2: noreply，3: noreachable, 4: all，5:busy,noreply,noreachable
         *
         * mode: enable or disable forward。3:enable，4:disable。
         */

        $socket = $this->openGoipDialog($recvid, $goip_host, $goip_port);

        $sendbuf = "CF " . $recvid . " " . $goip_pwd . " " . $reason . " " . $mode . " " . $num . " " . $ftime;

        $socks[] = $socket;

        if (@socket_sendto($socket, $sendbuf, strlen($sendbuf), 0, $this->goip_server, $this->goipcronport) === false) {
            return "sendto error";
        }

        $answer = $this->reciveGoipFor($socks, $socket, $sendbuf);

        $this->closeGoipDialog($recvid);

        return $answer;
    }

    public function sendUssdSingle($recvid, $goip_host, $goip_port, $goip_passwd, $ussd_command)
    {

        $socket = $this->openGoipDialog($recvid, $goip_host, $goip_port);
        $sendbuf = "USSD " . $recvid . " " . $goip_passwd . " " . $ussd_command;
        // print_r($sendbuf);
        $socks[] = $socket;
        if (@socket_sendto($socket, $sendbuf, strlen($sendbuf), 0, $this->goip_server, $this->goipcronport) === false) {
            echo "ERROR sendto error\n";
        }
        $answer = $this->reciveGoipFor($socks, $socket, $sendbuf);
        $this->closeGoipDialog($recvid);
        return $answer;
    }

    public function getImei($recvid, $goip_host, $goip_port, $goip_passwd)
    {

        $socket = $this->openGoipDialog($recvid, $goip_host, $goip_port);
        $sendbuf = "get_imei " . $recvid . " " . $goip_passwd;
        $socks[] = $socket;
        if (@socket_sendto($socket, $sendbuf, strlen($sendbuf), 0, $this->goip_server, $this->goipcronport) === false) {
            echo "ERROR sendto error\n";
        }
        $answer = $this->reciveGoipFor($socks, $socket, $sendbuf);
        $this->closeGoipDialog($recvid);
        return $answer;
    }

    public function setImei($recvid, $goip_host, $goip_port, $goip_passwd, $imei)
    {

        $socket = $this->openGoipDialog($recvid, $goip_host, $goip_port);
        $sendbuf = "set_imei " . $recvid . " " . $imei ." ". $goip_passwd;
        $socks[] = $socket;
        if (@socket_sendto($socket, $sendbuf, strlen($sendbuf), 0, $this->goip_server, $this->goipcronport) === false) {
            echo "ERROR sendto error\n";
        }
        $answer = $this->reciveGoipFor($socks, $socket, $sendbuf);
        $this->closeGoipDialog($recvid);
        return $answer;
    }

    /*
     * 0 - disable  GoIP module
     * 1 - enable GoIP module
     */
    public function enablehModule($recvid, $goip_host, $goip_port, $goip_passwd, $enable)
    {

        $socket = $this->openGoipDialog($recvid, $goip_host, $goip_port);
        $sendbuf = "module_ctl_i " . $recvid . " " . $enable ." ". $goip_passwd;
        $socks[] = $socket;
        if (@socket_sendto($socket, $sendbuf, strlen($sendbuf), 0, $this->goip_server, $this->goipcronport) === false) {
            echo "ERROR sendto error\n";
        }
        $answer = $this->reciveGoipFor($socks, $socket, $sendbuf);
        $this->closeGoipDialog($recvid);
        return $answer;
    }

    public function getStatusChannel($recvid, $goip_host, $goip_port, $goip_passwd)
    {

        $socket = $this->openGoipDialog($recvid, $goip_host, $goip_port);
        $sendbuf = "get_gsm_state " . $recvid  ." ". $goip_passwd;
        $socks[] = $socket;
        if (@socket_sendto($socket, $sendbuf, strlen($sendbuf), 0, $this->goip_server, $this->goipcronport) === false) {
            echo "ERROR sendto error\n";
        }
        $answer = $this->reciveGoipFor($socks, $socket, $sendbuf);
        $this->closeGoipDialog($recvid);
        return $answer;
    }

    public function rebootModuleGoip($recvid, $goip_host, $goip_port, $goip_passwd)
    {

        $socket = $this->openGoipDialog($recvid, $goip_host, $goip_port);
        $sendbuf = "svr_reboot_module " . $recvid  ." ". $goip_passwd;
        $socks[] = $socket;
        if (@socket_sendto($socket, $sendbuf, strlen($sendbuf), 0, $this->goip_server, $this->goipcronport) === false) {
            echo "ERROR sendto error\n";
        }
        $answer = $this->reciveGoipFor($socks, $socket, $sendbuf);
        $this->closeGoipDialog($recvid);
        return $answer;
    }

    public function getCellsList($recvid, $goip_host, $goip_port, $goip_passwd)
    {

        $socket = $this->openGoipDialog($recvid, $goip_host, $goip_port);
        $sendbuf = "";
        $socks[] = $socket;
        if (@socket_sendto($socket, $sendbuf, strlen($sendbuf), 0, $this->goip_server, $this->goipcronport) === false) {
            echo "ERROR sendto error\n";
        }
        $answer = $this->reciveGoipFor($socks, $socket, $sendbuf);
        $this->closeGoipDialog($recvid);
        return $answer;
    }

    public function myGetList($recvid, $goip_host, $goip_port, $goip_passwd, $data)
    {

        if (($socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)) <= 0) {
            return "socket_create() failed: reason: " . socket_strerror($socket);
            exit;
        }


        $sendbuf = "goipReq:getList;id:" . $recvid  .";pwd:". $goip_passwd.";ip:".$goip_host.";port:".$goip_port;
        $sendbuf = $data.";ip:".$goip_host.";port:".$goip_port;
        $socks[] = $socket;
        if (@socket_sendto($socket, $sendbuf, strlen($sendbuf), 0, $this->goip_server, $this->goipcronport) === false) {
            echo "ERROR sendto error\n";
        }


    }





}