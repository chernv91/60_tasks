<?php

function getManWithLessFriends(array $users)
{
    $user = null;

    if (!empty($users)) {

        $min_friends_count = count($users[0]['friends']);
        $user_index = 0;

        foreach ($users as $index => $user) {

            if ($index === 0) {
                continue;
            }

            foreach ($user as $key => $value) {

                if ($key === 'friends') {

                    $friends_count = count($value);

                    if ($friends_count <= $min_friends_count) {
                        $min_friends_count = $friends_count;
                        $user_index = $index;
                    }

                }

            }

        }

        $user = $users[$user_index];
    }

    return $user;
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
    ['name' => 'Keit', 'friends' => []],
    [
        'name' => 'Rob',
        'friends' => [
            ['name' => 'Taywin', 'gender' => 'male'],
        ],
    ],
];

echo '<pre>';
print_r(getManWithLessFriends($users));
echo '</pre>';
// => ['name' => 'Keit', 'friends' => []];

$users = [];
var_dump(getManWithLessFriends($users));
// null
