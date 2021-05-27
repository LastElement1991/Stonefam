<?php
function wordsCount($s)
{
    $count = 1;
    $i = 1;
    while (isset($s[$i])) {
        if ($i > 0 &&
            ($s[$i - 1] != ' ' && $s[$i - 1] != '.' && $s[$i - 1] != ',' && $s[$i - 1] != '!' && $s[$i - 1] != '?') &&
            ($s[$i] == ' ' || $s[$i] == '.' || $s[$i] == ',' || $s[$i] == '!' || $s[$i] == '?')
        ) {
            $count++;
        }
        $i++;
    }
    $i--;
    if ($s[$i] == ' ' || $s[$i] == '.' || $s[$i] == ',' || $s[$i] == '!' || $s[$i] == '?') {
        $count--;
    }

    return $count;
}

var_dump(wordsCount('Hello world!'));
var_dump(wordsCount('Hello world! Hello,    country!'));