<?php

function wordsCount(string $sentence): array
{
    $words = [];

    if (!empty($sentence)) {
        $arr = explode(' ', $sentence);
        $new_arr = [];

        foreach ($arr as $item) {

            if (!empty($item)) {
                $new_arr[] = $item;
            }

        }

        $words = array_count_values($new_arr);
    }

    return $words;
}

print_r(wordsCount('')); // []
echo '<br>';

print_r(wordsCount('  one two one')); // ['one' => 2, 'two' => 1]
echo '<br>';

print_r(wordsCount('  one      two       one     ')); // ['one' => 2, 'two' => 1]