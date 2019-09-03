<?php


namespace app\models;


class PTotal
{
    public static function pageTotal($provider, $fieldName)
    {
        $total = 0;
        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }
        return $total;
    }

    public static function pageAverage($provider, $fieldName)
    {
        $total = 0;
        $i = 0;
        foreach ($provider as $item) {
            $i += 1;
            $total += $item[$fieldName];
        }
        if ($i == 0) {
            return false;
        } else {

            return round($total / $i, 2);
        }
    }

}
