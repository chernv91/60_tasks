<?php

function union(array...$arrays): array
{
    $arrays_count = count($arrays);

    if ($arrays_count > 1) {
        $new_arr = [];

        foreach ($arrays as $arr) {
            $arr = array_unique($arr);
            $new_arr = array_unique(array_merge($new_arr, $arr));
        }

        $new_arr = array_values($new_arr);
    } else {
        $new_arr = $arrays[0];
    }

    return $new_arr;
}

echo '<pre>';
var_dump(union([3])); // => [3]
echo '</pre>';

echo '<pre>';
var_dump(union([3, 2], [2, 2, 1])); // => [3, 2, 1]
echo '</pre>';

echo '<pre>';
var_dump(union(['a', 3, false], [true, false, 3], [false, 5, 8])); // => ['a', 3, false, true, 5, 8]
echo '</pre>';