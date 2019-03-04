<?php

function performQueries(): bool
{
    $result = true;
    $mysqli = new mysqli('localhost', 'root', 'password', 'db');

    $sql1 = <<<SQL
DROP TABLE IF EXISTS article_categories
SQL;

    $sql2 = <<<SQL
CREATE TABLE article_categories
(
  id   INT AUTO_INCREMENT,
  name VARCHAR(255),
  PRIMARY KEY (id)
);
SQL;

    $sql3 = <<<SQL
INSERT INTO article_categories(name)
VALUES ('value1'),
       ('value2')
SQL;

    $queries = [$sql1, $sql2, $sql3];

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
