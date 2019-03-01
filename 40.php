<?php

function without(array $arr, ...$except_values): array
{
    foreach ($except_values as $value) {

        if (in_array($value, $arr, true)) {

            $keys = array_keys($arr, $value, true);
            $i = 0;

            foreach ($keys as $key) {
                $i++;

                if ($i !== 1) {
                    $key--;
                }

                array_splice($arr, $key, 1);
            }

        }

    }

    return $arr;
}

echo '<pre>';
var_dump(without([3, 4, 10, 4, 'true'], 4)); // => [3, 10, 'true']
echo '</pre>';

echo '<pre>';
var_dump(without(['3', 2], 0, 5, 11)); // => ['3', 2]
echo '</pre>';