<?php

function checkIfBalanced(string $str): bool
{
    $result = true;
    $parenthesis_cnt = 0;
    $str_length = strlen($str);

    for ($i = 0; $i < $str_length; $i++) {

        if ($str{$i} === '(') {
            $parenthesis_cnt++;
        }

        if ($str{$i} === ')') {
            $parenthesis_cnt--;

            if ($parenthesis_cnt === -1) {
                $result = false;
                break;
            }

        }

    }

    if ($parenthesis_cnt !== 0) {
        $result = false;
    }

    return $result;
}

var_dump(checkIfBalanced('(5 + 6) * (7 + 8)/(4 + 3)')); // => true
var_dump(checkIfBalanced('(((4 + 3))')); // => false
var_dump(checkIfBalanced('(4 + 3))')); // => false