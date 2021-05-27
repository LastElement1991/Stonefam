<?php
$max = 3;
$number = [12,14,18,68];
$i = 0;
$count = 0;
$sum = 0;
while ($i<= $max) {
    $int = $number[$i];
    $i++;
    if ($int > 0 && $int % 6 == 0) {
        $count++;
        $sum += $int;
    }
}
    echo $count . " " . $sum;
