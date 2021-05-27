<?php
function transform ($s){
    $code = ord ($s);
    $code_a = ord ('a');
    $code_z = ord ('z');
    if ($code>=$code_a && $code<=$code_z){
        return strtoupper($s);
    }
    return strtolower($s);
}
$string = file_get_contents('file.txt');
$mass = explode("\n", $string);
foreach ($mass as $mas){
    $i =0;
    $length =  mb_strlen($mas);
  $result_str = [];
    while($i<$length){
      $result_str [] = $str[$];
      $i++;
  }
  var_dump($result_str);
}
