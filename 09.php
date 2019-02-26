<?php

function calculateAverage(array $arr)
{
    $average = null;

    if (!empty($arr)) {
        $array_length = count($arr);
        $average = array_sum($arr) / $array_length;
    }

    return $average;

}

$temperatures = [37.5, 34, 39.3, 40, 38.7, 41.5];
var_dump(calculateAverage($temperatures)); // => 38.5

$temperatures = [];
var_dump(calculateAverage($temperatures)); // => null