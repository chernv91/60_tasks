<?php

function addPrefix(array $arr, string $prefix): array
{
    $new_arr = [];

    foreach ($arr as $value) {

        if (is_string($value)) {
            $new_arr[] = "$prefix $value";
        }

    }

    return $new_arr;
}

$names = ['john', 'smith', 'karl', 9];

$newNames = addPrefix($names, 'Mr');
print_r($newNames);
// => ['Mr john', 'Mr smith', 'Mr karl'];