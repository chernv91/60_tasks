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
  id         int auto_increment,
  username   varchar(255) NOT NULL,
  email      varchar(255) NOT NULL,
  created_at timestamp    NOT NULL,
  primary key (id),
  unique (username)
);
SQL;

    $sql3 = <<<SQL
DROP TABLE IF EXISTS topics
SQL;

    $sql4 = <<<SQL
CREATE TABLE topics
(
  id         int auto_increment,
  user_id    int,
  body       varchar(255) NOT NULL,
  created_at timestamp    NOT NULL,
  primary key (id),
  FOREIGN KEY (user_id) REFERENCES users (id)
);
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
