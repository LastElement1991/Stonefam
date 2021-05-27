<?php
//таск 2
//$string = file_get_contents('file.txt');
//$mass = explode("\n", $string);
//foreach ($mass as $mas) {
//    $result_str = '';
//    $i = 1;
//    $length = mb_strlen($mas);
//    while($i<=$length){
//        $reg = $length-$i;
//       $string=$mas[$reg];
//        $result_str.= $string;
//        $i++;
//   }
//    var_dump($result_str);
//}

// таск 3
$string = file_get_contents('file.txt');
$mass = explode("\n", $string);

$str = '';
foreach ($mass as $mas) {
    $result_str = '';
    $i = 0;
    while($i<$length){
        if ($mas[$i]==''){
            $result_str.= ' ';
        }
        $result_str.= $mas[$i];
        $i++;
    }
    var_dump($result_str);
}
/// таск 4
//$string = file_get_contents('file.txt');
//$mass = explode("\n", $string);
//$first='С';
//$second = 'К';
//foreach ($mass as $mas) {
//
//    $pos_first = strpos($mas,$first);
//    $pos_second = strpos($mas,$second);
//        if ($pos_first === false && $pos_second === false){
//            echo "$mas"."\n";
//        } else {
//  //          echo $mas."\n";
//        }
//}

//таск 5
//$string_first = file_get_contents('file_next.txt');
//$string_second = file_get_contents('file.txt');
//$str = '';
//$i=0;
//while ($string_second[$i] && $string_first[$i]) {
//    if ($string_first[$i] >= $string_second[$i]) {
//        $str .= $string_second[$i] . $string_first[$i];
//    } else {
//        $str .= $string_first[$i] . $string_second[$i];
//    }
//    $i++;
//}
//    print_r($str);
//$str = $string_first.$string_second;
//$i=0;
//$result_str = [];
//$length =  mb_strlen($str);
//while($i<$length){
//    $result_str[]= $str[$i];
//    $i++;
//}
//$array = $result_str;
//$i = 0;
//sort($array);
//$str = '';
//while($i<$length) {
//    $str .= $array[$i];
//    $i++;
//}
//print_r($str);