<?php

function solveQuadraticEquation(int $a, int $b, int $c): string
{
    if ($a !== 0) {
        $discriminant = $b * $b - 4 * $a * $c;

        if ($discriminant > 0) {
            $x1 = (-$b + sqrt($discriminant)) / 2 * $a;
            $x2 = (-$b - sqrt($discriminant)) / 2 * $a;
            $solution = "x1 = $x1, x2 = $x2";
        } elseif ($discriminant === 0) {
            $x = (-$b + sqrt($discriminant)) / 2 * $a;
            $solution = "x = $x";
        } else {
            $solution = 'Корней нет';
        }

    } else {
        $solution = 'a не может быть равно 0!';
    }

    return $solution;
}

echo solveQuadraticEquation(1, -2, -3) . '<br>'; // x1 = 3, x2 = -1
echo solveQuadraticEquation(-1, -2, 15) . '<br>'; // x1 = -5, x2 = 3
echo solveQuadraticEquation(1, 12, 36) . '<br>'; // x = -6
echo solveQuadraticEquation(5, 3, 7) . '<br>'; // Корней нет