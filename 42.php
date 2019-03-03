<?php

function createTable(): bool
{
    $result = true;
    $mysqli = new mysqli('localhost', 'root', 'password', 'db');

    $sql1 = <<<SQL
CREATE table IF NOT EXISTS courses
(
  name       VARCHAR(255),
  body       TEXT,
  created_at TIMESTAMP
)
SQL;

    $sql2 = <<<SQL
CREATE table IF NOT EXISTS  users
(
  first_name VARCHAR(255),
  email      VARCHAR(255),
  manager    BOOLEAN
)
SQL;

    $sql3 = <<<SQL
CREATE table IF NOT EXISTS  course_members
(
  user_id    INTEGER,
  course_id  INTEGER,
  created_at TIMESTAMP
)
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
    } catch (Exception $e) {
        echo $e->getMessage() . "\n";
        $result = false;
    }

    return $result;
}

var_dump(createTable());
