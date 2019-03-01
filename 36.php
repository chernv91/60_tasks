<?php

function getGirlFriends(array $users): array
{
    $girlfriends = [];

    foreach ($users as $user) {

        foreach ($user as $key => $value) {

            if ($key === 'friends' && !empty($value)) {

                foreach ($value as $friend) {

                    if (in_array('female', $friend, false)) {
                        $girlfriends[] = $friend['name'];
                    }

                }

            }

        }

    }

    return $girlfriends;
}

$users = [
    [
        'name' => 'Tirion',
        'friends' => [
            ['name' => 'Mira', 'gender' => 'female'],
            ['name' => 'Ramsey', 'gender' => 'male'],
        ],
    ],
    ['name' => 'Bronn', 'friends' => []],
    [
        'name' => 'Sam',
        'friends' => [
            ['name' => 'Aria', 'gender' => 'female'],
            ['name' => 'Keit', 'gender' => 'female'],
        ],
    ],
    [
        'name' => 'Rob',
        'friends' => [
            ['name' => 'Taywin', 'gender' => 'male'],
        ],
    ],
];

echo '<pre>';
print_r(getGirlFriends($users));
echo '</pre>';
//['Mira', 'Aria', 'Keit']
