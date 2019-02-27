<?php

function findIndex(array $arr, $element): int
{
    $index = array_search($element, $arr, false);

    if ($index === false) {
        $index = -1;
    }

    return $index;
}

$temperatures = [37.5, 34, 39.3, 40, 38.7, 41.5, 40];

echo findIndex($temperatures, 34) . '<br>'; // => 1
echo findIndex($temperatures, 40) . '<br>'; // => 3
echo findIndex($temperatures, 3) . '<br>';  // => -1