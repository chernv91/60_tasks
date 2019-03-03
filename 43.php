<?php

function performQueries(): bool
{
    $result = true;
    $mysqli = new mysqli('localhost', 'root', 'password', 'db');

    $sql1 = <<<SQL
DROP TABLE IF EXISTS users
SQL;

    $sql2 = <<<SQL
CREATE TABLE users
(
  first_name varchar(255),
  email      varchar(255),
  manager    boolean
)
SQL;

    $sql3 = <<<SQL
INSERT INTO users (first_name, email)
VALUES ('Sansa', 'sansa@winter.com'),
       ('Tirion', 'tirion@got.com')
SQL;

    $sql4 = <<<SQL
DELETE
FROM users
WHERE first_name = 'Sansa'
SQL;

    $sql5 = <<<SQL
INSERT INTO users (first_name, email)
VALUES ('Arya', 'arya@winter.com')
SQL;

    $sql6 = <<<SQL
UPDATE users
SET manager = true
WHERE email = 'tirion@got.com'
SQL;

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
        if (!$mysqli->query($sql4)) {
            throw new Exception($mysqli->error);
        }
        if (!$mysqli->query($sql5)) {
            throw new Exception($mysqli->error);
        }
        if (!$mysqli->query($sql6)) {
            throw new Exception($mysqli->error);
        }
    } catch (Exception $e) {
        echo $e->getMessage() . "\n";
        $result = false;
    }

    return $result;
}

var_dump(performQueries());
