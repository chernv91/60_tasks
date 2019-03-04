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
  first_name VARCHAR(255),
  email      VARCHAR(255),
  house      VARCHAR(255),
  birthday   TIMESTAMP
);
SQL;

    $sql3 = <<<SQL
INSERT INTO users (first_name, email, birthday, house)
VALUES ('Sansa', 'sansa@winter.com', '1999-10-23', 'stark'),
       ('Jon', 'jon@winter.com', '1999-10-07', 'stark'),
       ('Daenerys', 'daenerys@drakaris.com', '1999-10-23', 'targarien'),
       ('Arya', 'arya@winter.com', '2003-03-29', 'stark'),
       ('Robb', 'robb@winter.com', '1999-11-23', 'stark'),
       ('Brienne', 'brienne@tarth.com', '2001-04-04', 'tart'),
       ('Tirion', 'tirion@got.com', '1975-1-11', 'lannister');
SQL;

    $sql4 = <<<SQL
SELECT DISTINCT (house)
FROM users
ORDER BY house
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

