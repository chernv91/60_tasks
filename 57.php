<?php

function cd(string $cur_dir, string $path): string
{
    $arr = explode('/', $path);

    if (empty($arr[0])) {
        $result = $path;
    } else {
        $arr2 = explode('/', $cur_dir);

        foreach ($arr as $value) {

            if ($value === '..') {
                array_pop($arr2);
            }

        }

        $last = array_pop($arr);
        $arr2[] = $last;
        $result = implode('/', $arr2);
    }

    return $result;
}

echo cd('/current/path', '/etc') . '<br>'; // /etc
echo cd('/current/path', '.././anotherpath'); // /current/anotherpath
