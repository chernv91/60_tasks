<?php

function genDiff(array $arr1, array $arr2): array
{
    $joined_arr = array_merge($arr1, $arr2);
    $result = [];

    foreach ($joined_arr as $key => $item) {

        if (array_key_exists($key, $arr1)) {

            if (array_key_exists($key, $arr2)) {

                if ($arr1[$key] === $arr2[$key]) {
                    $result[$key] = 'unchanged';
                } else {
                    $result[$key] = 'changed';
                }

            } else {
                $result[$key] = 'deleted';
            }

        } else {
            $result[$key] = 'added';
        }

    }

    return $result;
}

$result = genDiff(
    ['one' => 'eon', 'two' => 'two', 'four' => true],
    ['two' => 'own', 'zero' => 4, 'four' => true]
);

echo '<pre>';
print_r($result);
echo '</pre>';
// => [
//     'one' => 'deleted',
//     'two' => 'changed'
//     'zero' => 'added',
//     'four' => 'unchanged',
// ];