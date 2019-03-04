<?php

function performQueries(): array
{
    $mysqli = new mysqli('localhost', 'root', 'password', 'db');

    $sql1 = <<<SQL
DROP TABLE IF EXISTS users
SQL;

    $sql2 = <<<SQL
CREATE TABLE users
(
  first_name VARCHAR(255),
  email      VARCHAR(255),
  birthday   TIMESTAMP
);
SQL;

    $sql3 = <<<SQL
INSERT INTO users (first_name, email, birthday)
VALUES ('Sansa', 'sansa@winter.com', '1999-10-23'),
       ('Jon', 'jon@winter.com', '1999-10-07'),
       ('Daenerys', 'daenerys@drakaris.com', NULL),
       ('Arya', 'arya@winter.com', '2003-03-29'),
       ('Robb', 'robb@winter.com', '1999-11-23'),
       ('Brienne', 'brienne@tarth.com', '2001-04-04'),
       ('Tirion', 'tirion@got.com', '1975-1-11');
SQL;

    $sql4 = <<<SQL
SELECT first_name, DATE(birthday) AS date
FROM users
ORDER BY birthday DESC
SQL;

    $queries = [$sql1, $sql2, $sql3, $sql4];

    foreach ($queries as $query) {

        try {

            if (!$mysqli->query($query)) {
                throw new Exception($mysqli->error);
            }

        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
        }

    }

    $users = $mysqli->query($sql4);
    $first_names = [];

    if ($users !== false) {
        $users = $users->fetch_all(MYSQLI_ASSOC);
        $today = date('Y-m-d');
        $empty_birthdays = [];

        foreach ($users as $user) {

            foreach ($user as $key => $value) {

                if ($key === 'date') {

                    if ($value !== $today) {
                        $first_names[] = $user;
                    } else {
                        $empty_birthdays[] = $user;
                    }

                }

            }

        }

        if ($empty_birthdays) {
            $first_names = array_column(array_merge($first_names, $empty_birthdays), 'first_name');
        }

    }

    return $first_names;
}

print_r(performQueries());

