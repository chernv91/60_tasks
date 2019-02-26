<?php

function getSameCount(array $arr1, array $arr2): int
{
    $count = 0;

    if (!empty($arr1) && !empty($arr2)) {
        $joined_arr = array_unique(array_intersect($arr1, $arr2));
        $count = count($joined_arr);
    }

    return $count;
}

echo getSameCount([], []) . '<br>'; // => 0
echo getSameCount([1, 10, 3], [10, 100, 35, 1]) . '<br>'; // => 2
echo getSameCount([1, 3, 2, 2], [3, 1, 1, 2]) . '<br>'; // => 3