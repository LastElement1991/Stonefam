<?php
//function max_element ($one)
//{
    $one = 328;
    $int = "$one";
      $i = 0;
    $str = '';
//    if ($i > $str) {
//        $str = $int[$i];
//        $i++;
//    }
if ($int[$i] > $str) {
    $str = $int[$i];
    $i++;

}
$str3=$int[$i];
    if ($str3<=$str) {
        $str = $int[$i];
        $i++;
    }
$str3=$int[$i];
if ($str3<=$str) {
    $str = $int[$i];
    $i++;
}
    print_r($str);
//    return str;
//}


$int_1 = 328;
//$result = max_element($int_1);
//print_r($result);
$str ="$int_1";
$str = "$int_1";
$int_2 = 832;
$str_2= "$int_2";