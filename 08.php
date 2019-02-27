<?php

function swap(array $arr, int $index): array
{
    $arr_count = count($arr);

    if ($arr_count > 2 && $index !== 0 && $index !== $arr_count - 1) {
        $tmp = $arr[$index - 1];
        $arr[$index - 1] = $arr[$index + 1];
        $arr[$index + 1] = $tmp;
    }

    return $arr;
}

$names = ['john', 'smith', 'karl', 'fred'];

$result = swap($names, 1);
print_r($result); // => ['karl', 'smith', 'john', 'fred']
echo '<br>';

$result = swap($names, 2);
print_r($result); // => ['john', 'fred', 'karl', 'smith']
echo '<br>';

$result = swap($names, 3);
print_r($result); // => ['john', 'smith', 'karl', 'fred']