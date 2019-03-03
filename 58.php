<?php

function rrmdir(string $dir_name): bool
{
    $result = false;

    if (strpos($dir_name, '/') === 0) {
        $full_path = $dir_name;
    } else {
        $full_path = __DIR__ . "/$dir_name";
    }


    if (file_exists($full_path)) {

        $files = scandir($full_path, SCANDIR_SORT_ASCENDING);

        foreach ($files as $file) {

            if ($file === '.' || $file === '..') {
                continue;
            }

            if (is_file($full_path . "/$file")) {
                $result = unlink($full_path . "/$file");

                if ($result === false) {
                    throw new Exception("Не удалось удалить файл: $full_path/$file");
                }

            }

            if (!empty($full_path . "/$file") && is_dir($full_path . "/$file")) {
                rrmdir("$dir_name/$file");
            }

        }

        $result = rmdir($full_path);

        if ($result === false) {
            throw new Exception("Не удалось удалить директорию: $full_path");
        }

    }

    return $result;
}

try {
    var_dump(rrmdir('test1'));
} catch (Exception $e) {
    echo 'Выброшено исключение: ', $e->getMessage(), "\n";
}

try {
    var_dump(rrmdir('/opt/lampp/htdocs/60_tasks/test'));
} catch (Exception $e) {
    echo 'Выброшено исключение: ', $e->getMessage(), "\n";
}
