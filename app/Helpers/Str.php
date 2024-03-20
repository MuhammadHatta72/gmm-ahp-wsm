<?php

namespace App\Helpers;

class Str
{
    public static function snake(String $text = null)
    {
        return strtolower(preg_replace('/(?|([a-z\d])([A-Z])|([^\^])([A-Z][a-z]))/', '$1_$2', $text));
    }
}
