<?php

function takeOldest(array $users, int $users_count = 1): array
{
    $oldest = [];

    $birthdays = array_column($users, 'birthday');

    foreach ($birthdays as &$birthday) {
        $birthday = strtotime($birthday);
    }

    unset($birthday);
    asort($birthdays);

    $i = 0;

    foreach ($birthdays as $key => $value) {

        if ($i !== $users_count) {
            $i++;

            if ($users_count === 1) {
                $oldest = $users[$key];
            } else {
                $oldest[] = $users[$key];
            }

        } else {
            break;
        }

    }

    return $oldest;
}

$users = [
    ['name' => 'Tirion', 'birthday' => '1988-11-19'],
    ['name' => 'Sam', 'birthday' => '1999-11-22'],
    ['name' => 'Rob', 'birthday' => '1975-01-11'],
    ['name' => 'Sansa', 'birthday' => '2001-03-20'],
    ['name' => 'Tisha', 'birthday' => '1992-02-27'],
];

echo '<pre>';
print_r(takeOldest($users));
echo '</pre>';
# => Array (
#   ['name' => 'Rob', 'birthday' => '1975-01-11']
# )