<?php

function getDifference(array $arr1, array $arr2): array
{
    $result = [];

    foreach ($arr1 as $value) {

        if (!in_array($value, $arr2, true)) {
            $result[] = $value;
        }

    }

    return $result;
}

echo '<pre>';
print_r(getDifference([2, 1], [2, 3]));
echo '</pre>';
// → [1]

echo '<pre>';
var_dump(getDifference([3, 4, 7, '2'], [2, 3]));
echo '</pre>';
// → [4, 7, '2']
