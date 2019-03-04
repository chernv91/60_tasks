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

    $queries = [$sql1, $sql2, $sql3, $sql4, $sql5, $sql6];

    foreach ($queries as $query) {

        try {

            if (!$mysqli->query($query)) {
                throw new Exception($mysqli->error);
            }

        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
            $result = false;
        }

    }

    return $result;
}

var_dump(performQueries());
