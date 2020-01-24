<?php

namespace App\Helpers;

class MoneyHelper
{

    public static function encode($value)
    {
        return bcmul($value, 100);
    }

    public static function decode($value)
    {
        return bcdiv($value, 100, 2);
    }

}
