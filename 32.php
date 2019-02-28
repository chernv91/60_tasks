<?php

function slugify(string $str): string
{
    $result = '';

    if (!empty($str)) {
        $str = strtolower($str);
        $words = explode(' ', $str);
        $tmp_arr = [];

        foreach ($words as $word) {

            if (!empty($word)) {
                $tmp_arr[] = $word;
            }

        }

        $result = implode('-', $tmp_arr);
    }

    return $result;
}

var_dump(slugify('')); // ''
var_dump(slugify('test')); // 'test'
var_dump(slugify('test me')); // 'test-me'
var_dump(slugify('La La la LA')); // 'la-la-la-la'
var_dump(slugify('O la      lu')); // 'o-la-lu'
var_dump(slugify(' yOu   ')); // 'you'