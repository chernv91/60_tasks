<?php

function countUniqChars(string $str): int
{
    $uniq_count = 0;
    $str_length = mb_strlen($str);

    if ($str_length > 0) {
        $uniq_chars = [];

        for ($i = 0; $i < $str_length; $i++) {
            $char = mb_substr($str, $i, 1);

            if (!in_array($char, $uniq_chars, false)) {
                $uniq_chars[] = $char;
            }

        }

        $uniq_count = count($uniq_chars);
    }

    return $uniq_count;
}

$text1 = 'yyab';
echo countUniqChars($text1) . '<br>'; // => 3

$text2 = 'You know nothing Jon Snow';
echo countUniqChars($text2) . '<br>'; // => 13

$text3 = '';
echo countUniqChars($text3) . '<br>'; // => 0

$text4 = 'абвггг';
echo countUniqChars($text4) . '<br>'; // => 4