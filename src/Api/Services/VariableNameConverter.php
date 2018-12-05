<?php

namespace App\Api\Services;

class VariableNameConverter {

    public static function toCamelCase($str, $separator = '_') {
        return lcfirst(str_replace($separator, '', ucwords($str, $separator)));
    }

    public static function uncamelCase($str) {
        $str = preg_replace('/([a-z])([A-Z])/', "\\1_\\2", $str);
        $str = strtolower($str);
        
        return $str;
    }

}
