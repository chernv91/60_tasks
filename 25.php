<?php

function getSortedNames(array $users): array
{
    $names = array_column($users, 'name');
    sort($names);
    return $names;
}

$users = [
    ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
    ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
    ['name' => 'Eiegon', 'gender' => 'male', 'birthday' => '1963-11-03'],
    ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03'],
];

echo '<pre>';
print_r(getSortedNames($users)); // => ['Bronn', 'Eiegon', 'Reigar', 'Sansa'];
echo '</pre>';