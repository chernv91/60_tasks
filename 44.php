<?php

function performQueries()
{
    $mysqli = new mysqli('localhost', 'root', 'password', 'db');

    $sql1 = <<<SQL
DROP TABLE IF EXISTS users
SQL;

    $sql2 = <<<SQL
CREATE TABLE users
(
  first_name varchar(255),
  email      varchar(255),
  birthday   timestamp
)
SQL;

    $sql3 = <<<SQL
INSERT INTO users (first_name, email, birthday)
VALUES ('Sansa', 'sansa@winter.com', '1999-10-23'),
       ('Jon', 'jon@winter.com', '1999-10-07'),
       ('Daenerys', 'daenerys@drakaris.com', '1999-10-23'),
       ('Arya', 'arya@winter.com', '2003-03-29'),
       ('Robb', 'robb@winter.com', '1999-11-23'),
       ('Brienne', 'brienne@tarth.com', '2001-04-04'),
       ('Tirion', 'tirion@got.com', '1975-1-11');
SQL;

    $sql4 = <<<SQL
SELECT first_name, email, birthday
FROM users
WHERE birthday > '1999-10-23'
ORDER BY first_name
LIMIT 3
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

    if ($users !== false) {
        $users = $users->fetch_all(MYSQLI_ASSOC);
    }

    return $users;
}

print_r(performQueries());
