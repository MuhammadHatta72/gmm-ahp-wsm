<?php

namespace App\Helpers;

class GeoMetricMean
{
    static public function count(array $numbers)
    {
        $count = count($numbers);
        $product = array_product($numbers);

        $pow = pow($product, 1 / $count);

        return number_format($pow, 2);
    }
}
