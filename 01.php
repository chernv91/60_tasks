<?php

function isPalindrome(string $word): bool
{
    $result = true;
    $word_length = mb_strlen($word);

    if ($word_length > 1) {
        $half_str_length = (int)($word_length / 2);

        for ($i = 0; $i < $half_str_length; $i++) {
            $char_from_begin = mb_substr($word, $i, 1);
            $char_from_end = mb_substr($word, $word_length - $i - 1, 1);

            if ($char_from_begin !== $char_from_end) {
                $result = false;
                break;
            }

        }

    }

    return $result;
}

var_dump(isPalindrome('radar'));// true
var_dump(isPalindrome('maam')); // true
var_dump(isPalindrome('a'));     // true
var_dump(isPalindrome('abs'));   // false
var_dump(isPalindrome('радар'));   // true
var_dump(isPalindrome('радим'));   // false