<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09.08.18
 * Time: 14:17
 * https://eu1.unwiredlabs.com/v2/process.php
 *  LAC:DD,CELL ID:420AACB

 */

class getAdress
{
    public $token = 'e80fbe99028f3c';

    public function getGoipAdress($mcc, $mnc, $lac, $cellId)
    {
//
//    $array = [
//        "token"=> $this->token,
//        "radio"=> "gsm",
//        "mcc"=> $mcc,
//        "mnc"=> $mnc,
//        "cells" => [
//            "lac" => hexdec($lac),
//            "cid" => hexdec($cellId),
//            ],
//        "address"=> 1,
//        ];
    // $data_string='{"token":"e80fbe99028f3c","radio":"gsm","mcc":"250","mnc":"02","cells":[{"lac":"7840","cid":"8118415"}],"address":1}';
    //    $data_string=json_encode($array);
    //    return $data_string;
        $data_string='{"token":"'.$this->token.'","radio":"gsm","mcc":"'.$mcc.'","mnc":"'.$mnc.'","cells":[{"lac":"'.hexdec($lac).'","cid":"'.hexdec($cid).'"}],"address":1}';

        $ch = curl_init('https://eu1.unwiredlabs.com/v2/process.php');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//                'Content-Type: application/json',
//                'Content-Length: ' . strlen($data_string))
//        );

        return curl_exec($ch);

    }
}