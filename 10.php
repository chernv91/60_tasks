<?php

function isContinuousSequence(array $num_sequence): bool
{
    $result = false;

    if (!empty($num_sequence)) {

        $result = true;
        $num_sequence_length = count($num_sequence);
        $diff1 = $num_sequence[1] - $num_sequence[0];

        for ($i = 1; $i < $num_sequence_length - 1; $i++) {
            $diff2 = $num_sequence[$i + 1] - $num_sequence[$i];

            if ($diff1 !== $diff2) {
                $result = false;
                break;
            }

        }

    }

    return $result;
}

var_dump(isContinuousSequence([10, 11, 12, 13]));     // => true
var_dump(isContinuousSequence([10, 11, 12, 14, 15])); // => false
var_dump(isContinuousSequence([1, 2, 2, 3]));         // => false
var_dump(isContinuousSequence([]));                   // => false