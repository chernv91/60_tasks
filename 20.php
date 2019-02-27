<?php

function getIntersectionForSortedArray(array $arr1, array $arr2): array
{
    $new_arr = [];

    if (!empty($arr1) && !empty($arr2)) {
        $new_arr = array_unique(array_intersect($arr1, $arr2));
    }

    return $new_arr;
}

print_r(getIntersectionForSortedArray([10, 11, 24], [10, 13, 14, 18, 24, 30]));
// => [10, 24]
print_r(getIntersectionForSortedArray([], []));
// => []

function myGetIntersectionForSortedArray(array $arr1, array $arr2): array
{
    $new_arr = [];

    if (!empty($arr1) && !empty($arr2)) {

        foreach ($arr1 as $item) {

            if (in_array($item, $arr2, false) && !in_array($item, $new_arr, false)) {

                $new_arr[] = $item;

            }

        }

    }

    return $new_arr;
}

echo '<br>';
print_r(myGetIntersectionForSortedArray([10, 11, 24], [10, 13, 14, 18, 24, 30]));
// => [10, 24]
print_r(myGetIntersectionForSortedArray([], []));
// => []