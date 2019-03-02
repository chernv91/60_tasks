<?php

function wordsCount(string $file_name): array
{
    $words = [];

    if (file_exists($file_name)) {
        $text = mb_strtolower(file_get_contents($file_name));
        $replacement = ' ';
        $pattern = '[…,–\!?:;«»\r\n*()]';
        $text = mb_ereg_replace($pattern, $replacement, $text);
        // удаляем цифры только из конструкций типа [7]
        $pattern = '[\[0-9]+\]';
        $text = mb_ereg_replace($pattern, $replacement, $text);
        // удаляем все точки, оставляем только в Royallib.ru
        $pattern = '[.][^A-z]';
        $text = mb_ereg_replace($pattern, $replacement, $text);

        if (!empty($text)) {
            $arr = explode(' ', $text);
            $new_arr = [];

            foreach ($arr as $item) {

                if (!empty($item)) {
                    $new_arr[] = $item;
                }

            }

            $words = array_count_values($new_arr);
        }

    }

    return $words;
}

$arr = $_SERVER['argv'];
print_r(wordsCount($arr[1]));
