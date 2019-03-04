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
  birthday   TIMESTAMP,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
SQL;

    $sql3 = <<<SQL
INSERT INTO users (first_name, email, house, birthday, created_at)
VALUES ('Sansa', 'sansa@winter.com', 'stark', '1999-10-23', '2018-11-03'),
       ('Jon', 'jon@winter.com', 'stark', '1999-10-07', '2018-10-23'),
       ('Daenerys', 'daenerys@drakaris.com', 'targarien', '1999-10-23', '2018-12-23'),
       ('Arya', 'arya@winter.com', 'stark', '2003-03-29', '2018-11-18'),
       ('Robb', 'robb@winter.com', 'stark', '1999-11-23', '2018-11-10'),
       ('Brienne', 'brienne@tarth.com', 'ne pomnu', '2001-04-04', '2018-11-28'),
       ('Tirion', 'tirion@got.com', 'lannister', '1975-1-11', '2018-11-23');
SQL;

    $sql4 = <<<SQL
SELECT first_name, email, house, birthday, created_at
FROM users
WHERE created_at BETWEEN '2018-11-23' AND '2018-12-12'
   OR house = 'stark'
ORDER BY created_at DESC
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

