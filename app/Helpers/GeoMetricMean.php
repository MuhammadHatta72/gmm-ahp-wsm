<?php

class GeoMetricMean
{
    protected $numbers;

    public function __construct(array $numbers)
    {
        $this->numbers = $numbers;
    }

    static public function count()
    {
        $count = count(self::$numbers);
        $product = array_product(self::$numbers);

        $pow = pow($product, 1 / $count);

        return number_format($pow, 2);
    }
}
