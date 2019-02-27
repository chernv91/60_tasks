<?php

function getSameParity(array $numbers): array
{
    $new_arr = [];

    if (!empty($numbers)) {
        $first_el_parity = ($numbers[0] % 2) ? 'odd' : 'even';

        if ($first_el_parity === 'odd') {

            foreach ($numbers as $value) {

                if ($value % 2) {
                    $new_arr[] = $value;
                }

            }

        } else {

            foreach ($numbers as $value) {

                if ($value % 2 === 0) {
                    $new_arr[] = $value;
                }

            }

        }
    }

    return $new_arr;
}

print_r(getSameParity([]));        // => []
print_r(getSameParity([1, 2, 3])); // => [1, 3]
print_r(getSameParity([1, 2, 8])); // => [1]
print_r(getSameParity([2, 2, 8])); // => [2, 2, 8]