<?php

$int = 343;
$str = "$int";
if ($a = $str[0] == $b = $str[1] and $b = $str[1] == $c = $str[2]) {
    echo "Треугольник равносторонний";
}else($a = $b = $str[1] !== $str[0] and $a = $str[0] == $c = $str[2]) {
    echo "Треугольник равнобедренный";
}
if ($a = $str[0] !== $b = $str[1] and $a = $str[0] !== $c = $str[2] and $b = $str[1] !== $c = $str[2]) {
    echo "Треугольник разносторонний";
}