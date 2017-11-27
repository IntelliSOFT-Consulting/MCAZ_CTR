<?php

namespace App\Utility;


class Xoro
{

    public static function generateXOR($object_id)
    {
        return ($object_id* 121) ^ 21541124;
    }


    public static function reverseXOR($xor_id)
    {
        return ($xor_id ^ 21541124)/121;
    }

    
}
