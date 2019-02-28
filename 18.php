<?php

function bubbleSort(array $arr): array
{
    if (!empty($arr)) {
        $arr_length = count($arr);

        for ($i = 0; $i < $arr_length - 1; $i++) {

            for ($j = 0; $j < $arr_length - 1 - $i; $j++) {

                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $tmp;
                }

            }

        }
    }

    return $arr;
}

print_r(bubbleSort([])); // => []
print_r(bubbleSort([3, 10, 4, 3])); // => [3, 3, 4, 10]