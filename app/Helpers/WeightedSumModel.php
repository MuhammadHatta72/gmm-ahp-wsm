<?php

namespace App\Helpers;

class WeightedSumModel
{
    public static function number_devide_max_of($number, array $numbers)
    {
        if ($number == 0 || max($numbers) == 0) {
            return 0;
        }

        return $number / max($numbers);
    }

    public static function min_devide_by_number(array $numbers, $number)
    {
        if ($number == 0 || min($numbers) == 0) {
            return 0;
        }

        return min($numbers) / $number;
    }

    public static function multiple($fist_number, $second_number)
    {
        return $fist_number * $second_number;
    }

    public static function rank($number, $numbers)
    {
        rsort($numbers);

        return array_search($number, $numbers) + 1;
    }
}
