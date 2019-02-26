<?php

function swap($a, $b)
{
    $GLOBALS['a'] = $b;
    $GLOBALS['b'] = $a;
    return true;
}

$a = 5;
$b = 8;
swap($a, $b);

print_r($a); // 8
print_r($b); // 5
