<?php

namespace App\Traits;

use App\Models\Order;

trait GenerateOrderCode
{
    public static function generateRandomCode()
    {
        $rand_number = 'RIG'.uniqid(time());

        if( Order::where('order_code', $rand_number)->exists() ){
            self::generateRandomCode();
        }

        return $rand_number;
    }
}
