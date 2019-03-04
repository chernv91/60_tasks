<?php

function performQueries(): bool
{
    $result = true;
    $mysqli = new mysqli('localhost', 'root', 'password', 'db');

    $sql1 = <<<SQL
DROP TABLE IF EXISTS users
SQL;

    $sql2 = <<<SQL
CREATE TABLE users (
    first_name varchar(255),
    last_name varchar(255),
    created_at timestamp
);
SQL;

    $sql3 = <<<SQL
DROP TABLE IF EXISTS cars
SQL;

    $sql4 = <<<SQL
CREATE TABLE cars (
    user_first_name varchar(255),
    brand varchar(255),
    model varchar (255)
);
SQL;

    $sql5 = <<<SQL
INSERT INTO users (first_name, last_name)
VALUES ('Sansa', 'Smith'),
       ('Tirion', 'Johnson');
SQL;

    $sql6 = <<<SQL
INSERT INTO cars (user_first_name, brand, model)
VALUES ('Sansa', 'bmw', 'x5'),
       ('Sansa', 'opel', 'vectra'),
       ('Tirion', 'mercedes', 'benz'),
       ('Tirion', 'honda', 'accord'),
       ('Tirion', 'nissan', 'almera');
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
