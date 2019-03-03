<?php

function performQueries(): array
{
    $users = [];
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

    $users = $mysqli->query($sql4);

    try {
        if (!$mysqli->query($sql1)) {
            throw new Exception($mysqli->error);
        }
        if (!$mysqli->query($sql2)) {
            throw new Exception($mysqli->error);
        }
        if (!$mysqli->query($sql3)) {
            throw new Exception($mysqli->error);
        }
        if (!$users) {
            throw new Exception($mysqli->error);
        }
    } catch (Exception $e) {
        echo $e->getMessage() . "\n";
    }

    $users = $users->fetch_all(MYSQLI_ASSOC);
    return $users;
}

print_r(performQueries());