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
  id         BIGINT PRIMARY KEY,
  birthday   DATE,
  email      VARCHAR(255) UNIQUE NOT NULL,
  first_name VARCHAR(50),
  created_at TIMESTAMP
);
SQL;

    $sql3 = <<<SQL
INSERT INTO users (id, first_name, email, birthday)
VALUES (1, 'Sansa', 'sansa@winter.com', '1999-10-23'),
       (2, 'Jon', 'jon@winter.com', NULL),
       (3, 'Daenerys', 'daenerys@drakaris.com', '1999-10-23'),
       (4, 'Arya', 'arya@winter.com', '2003-03-29'),
       (5, 'Robb', 'robb@winter.com', '1999-11-23'),
       (6, 'Brienne', 'brienne@tarth.com', '2001-04-04'),
       (7, 'Tirion', 'tirion@got.com', '1975-1-11');
SQL;

    $sql4 = <<<SQL
SELECT YEAR(birthday) AS year, COUNT(year(birthday)) AS count
FROM users
WHERE birthday IS NOT NULL
GROUP BY year
ORDER BY year;
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

    $count = $mysqli->query($sql4);

    if ($count !== false) {
        $count = $count->fetch_all(MYSQLI_ASSOC);
    }

    return $count;
}

print_r(performQueries());

