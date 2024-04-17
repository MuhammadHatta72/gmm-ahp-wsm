<?php

namespace App\Helpers;

class MatrixMultiplication
{
    public static function count(array $matrix1, array $matrix2): array
    {
        $result = array();

        foreach ($matrix1 as $index => $row1) {
            $temp = 0;
            for ($i = 0; $i < count($row1); $i++) {
                $temp += $row1[$i] * $matrix2[$i];
            }
            $result[$index] = $temp;
        }

        return $result;
    }
}
