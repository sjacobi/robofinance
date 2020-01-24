<?php

namespace App\Helpers;

class TimeHelper
{

    public static function toMySQL($value)
    {
        return date("Y-m-d H:i:s", strtotime($value));
    }

}
