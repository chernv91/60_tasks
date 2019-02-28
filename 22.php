<?php

function getIn(array $arr, array $keys)
{
    $result = null;
    $keys_count = count($keys);

    if ($keys_count === 1 && array_key_exists($keys[0], $arr)) {
        $result = $arr[$keys[0]];
    }

    if ($keys_count > 1) {
        $result = $arr[$keys[0]];

        if (is_array($result)) {
            array_shift($keys);
            $result = getIn($result, $keys);
        } else {
            $result = null;
        }

    }

    return $result;
}

$data = [
    'user' => 'ubuntu',
    'hosts' => [
        ['name' => 'web1'],
        ['name' => 'web2'],
    ],
];

var_dump(getIn($data, ['undefined']));        // => null
var_dump(getIn($data, ['user']));             // => 'ubuntu'
var_dump(getIn($data, ['user', 'ubuntu']));   // => null
var_dump(getIn($data, ['hosts', 1, 'name'])); // => 'web2'
var_dump(getIn($data, ['hosts', 0]));         // => ['name' => 'web1']