<?php

function average(...$numbers)
{
    $average = null;

    if (!empty($numbers)) {
        $average = array_sum($numbers) / count($numbers);
    }

    return $average;
}

var_dump(average(0)); // => 0
var_dump(average(0, 10)); // => 5
var_dump(average(-3, 4, 2, 10)); // => 3.25
var_dump(average()); // => null