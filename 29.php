<?php

function sayPrimeOrNot(int $number): bool
{
    $result = isPrimeNumber($number);

    if ($result === true) {
        echo 'yes';
    } else {
        echo 'no';
    }

    return true;
}

function isPrimeNumber(int $number): bool
{
    $result = true;

    for ($i = 2; $i < $number; $i++) {

        if ($number % $i === 0) {
            $result = false;
            break;
        }

    }

    return $result;
}

sayPrimeOrNot(5); // => yes
echo '<br>';
sayPrimeOrNot(4); // => no
echo '<br>';
sayPrimeOrNot(2); // => yes