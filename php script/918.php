<?php
//$string='I like sum-mer, because it is hot and sun-ny. – Я люблю лето, потому что оно жаркое и солнечное.';
//function explodeString($string): array
//{
//
//    $result=[];
//    $substring='';
//    $i=0;
//    while ($string[$i]){
//        $item=$string[$i];
//
//        if ($item=='-' OR $item==',' OR $item=='!' OR $item=='&' OR $item=='.' OR $item==' ' ){
//            $result[]= $substring;
//            $substring='';
//        }
//        else{
//            $substring.=$item;
//        }
//        $i++;
//    }
//    $result[]= $substring;
//    return $result;
//}
//$mass=explodeString($string);
//var_dump($mass);

$i=0;
$output = [];
$string = file_get_contents('file.txt', true);
$mass = explode ("\n", $string);
foreach ($mass as $mas){
    $numbers = explode (" ", $mas);
foreach ($)
}
