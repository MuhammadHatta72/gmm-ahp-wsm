<?php

namespace App\Helpers;

class GeoMetricMean
{
    public static function count(array $numbers): float
    {
        $count = count($numbers);
        $product = array_product($numbers);

        $pow = pow($product, 1 / $count);

        return number_format($pow, 2);
    }
}
