<?php

function isPalindrome(string $word): bool
{
    $result = true;
    $word_length = mb_strlen($word);

    if ($word_length > 1) {
        $reverse_word = '';

        for ($i = $word_length - 1; $i >= 0; $i--) {
            $reverse_word .= mb_substr($word, $i, 1);
        }

        if ($word !== $reverse_word) {
            $result = false;
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