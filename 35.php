<?php

function getChildren(array $users): array
{
    $children = [];

    foreach ($users as $user) {

        foreach ($user as $key => $value) {

            if ($key === 'children' && !empty($value)) {

                foreach ($value as $child) {
                    $children[] = $child;
                }

            }

        }

    }

    return $children;
}

$users = [
    [
        'name' => 'Tirion',
        'children' => [
            ['name' => 'Mira', 'birdhday' => '1983-03-23'],
        ],
    ],
    ['name' => 'Bronn', 'children' => []],
    [
        'name' => 'Sam',
        'children' => [
            ['name' => 'Aria', 'birdhday' => '2012-11-03'],
            ['name' => 'Keit', 'birdhday' => '1933-05-14'],
        ],
    ],
    [
        'name' => 'Rob',
        'children' => [
            ['name' => 'Tisha', 'birdhday' => '2012-11-03'],
        ],
    ],
];

echo '<pre>';
print_r(getChildren($users));
echo '</pre>';
// [
//     ['name' => 'Mira', 'birdhday' => '1983-03-23'],
//     ['name' => 'Aria', 'birdhday' => '2012-11-03'],
//     ['name' => 'Keit', 'birdhday' => '1933-05-14'],
//     ['name' => 'Tisha', 'birdhday' => '2012-11-03']
// ]