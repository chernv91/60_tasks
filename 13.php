<?php

function getIndexOfWarmestDay(array $data)
{
    $index = null;


    if (!empty($data)) {
        $max_temperature = $data[0][0];

        foreach ($data as $day_index => $day) {
            $max_value = max($day);

            if ($max_value > $max_temperature) {
                $max_temperature = $max_value;
                $index = $day_index;
            }

        }

    }

    return $index;

}

$data = [
    [-5, 7, 1],
    [3, 2, 3],
    [-1, -1, 10],
];
var_dump(getIndexOfWarmestDay($data)); // 2

$data = [];
var_dump(getIndexOfWarmestDay($data)); // null
