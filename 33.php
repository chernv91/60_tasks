<?php

$last = function (string $str) {
    $last_char = null;

    if (!empty($str)) {
        $last_char = mb_substr($str, mb_strlen($str) - 1, 1);
    }

    return $last_char;
};

var_dump($last('')); // => null
var_dump($last('pow')); // => w
var_dump($last('kids')); // => s
var_dump($last('мама')); // => а