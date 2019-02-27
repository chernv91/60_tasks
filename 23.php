<?php

function pick(array $data, array $keys): array
{
    $new_arr = [];

    if (!empty($keys)) {

        foreach ($keys as $arr_key) {

            if (array_key_exists($arr_key, $data)) {
                $new_arr[$arr_key] = $data[$arr_key];
            }

        }

    }

    return $new_arr;
}

$data = [
    'user' => 'ubuntu',
    'cores' => 4,
    'os' => 'linux',
];

print_r(pick($data, ['user']));       // → ['user' => 'ubuntu']
print_r(pick($data, ['user', 'os'])); // → ['user' => 'ubuntu', 'os' => 'linux']
print_r(pick($data, []));             // → []
print_r(pick($data, ['none']));       // → []