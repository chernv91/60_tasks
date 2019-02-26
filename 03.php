<?php

function reverse(int $number): int
{
    $num_to_str = (string)$number;
    $num_to_str_rev = strrev($num_to_str);

    if ($number < 0) {
        $number = -(int)$num_to_str_rev;
    } else {
        $number = (int)$num_to_str_rev;
    }

    return $number;
}

echo reverse(13) . '<br>'; // 31
echo reverse(-123) . '<br>'; // -321