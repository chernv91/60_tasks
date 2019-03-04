<?php

function performQueries(): bool
{
    $result = true;
    $mysqli = new mysqli('localhost', 'root', 'password', 'db');

    $sql1 = <<<SQL
DROP TABLE IF EXISTS users CASCADE
SQL;

    $sql2 = <<<SQL
CREATE TABLE users
(
  id    BIGINT PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  age   INTEGER,
  name  VARCHAR(255)
);
SQL;

    $sql3 = <<<SQL
INSERT INTO users (email, age, name)
VALUES ('noc@mail.com', 44, 'mike');
SQL;

    $sql4 = <<<SQL
ALTER TABLE users
  DROP COLUMN age,
  ADD UNIQUE (email),
  ADD created_at TIMESTAMP,
  CHANGE COLUMN `name` `first_name` VARCHAR(255) NOT NULL 
SQL;

    $queries = [$sql1, $sql2, $sql3, $sql4];

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

