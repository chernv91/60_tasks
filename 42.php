<?php

function createTable(): bool
{
    $result = true;
    $mysqli = new mysqli('localhost', 'root', 'password', 'db');

    $sql1 = <<<SQL
DROP TABLE IF EXISTS  courses
SQL;

    $sql2 = <<<SQL
CREATE table courses
(
  name       VARCHAR(255),
  body       TEXT,
  created_at TIMESTAMP
)
SQL;

    $sql3 = <<<SQL
DROP TABLE IF EXISTS  users
SQL;

    $sql4 = <<<SQL
CREATE table users
(
  first_name VARCHAR(255),
  email      VARCHAR(255),
  manager    BOOLEAN
)
SQL;

    $sql5 = <<<SQL
DROP TABLE IF EXISTS  course_members
SQL;

    $sql6 = <<<SQL
CREATE table course_members
(
  user_id    INTEGER,
  course_id  INTEGER,
  created_at TIMESTAMP
)
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

var_dump(createTable());
