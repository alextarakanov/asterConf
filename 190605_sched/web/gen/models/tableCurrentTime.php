<?php


namespace app\models;


class tableCurrentTime
{
    static  function fieldTableCurrentHour ()
    {
        date_default_timezone_set('Europe/Moscow');

        if ( date('i') < 30 ){
            $timeTable="b30";
        } else {
            $timeTable="a30";
        }
        return date('H').$timeTable;

    }
}