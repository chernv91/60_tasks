<?php

function get(array $arr, int $index, $value = null)
{
    if (array_key_exists($index, $arr)) {
        $value = $arr[$index];
    }

    return $value;
}

$cities = ['moscow', 'london', 'berlin', 'porto', 'paris'];

var_dump(get($cities, 1)); // => london
var_dump(get($cities, 10)); // => null
var_dump(get($cities, 4)); // => paris