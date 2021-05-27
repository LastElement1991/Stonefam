<?php
$string = file_get_contents('file.txt');
$mass = explode("\n", $string);
$str = '';
$max_lenght=  0;
foreach ($mass as $mas){
    if (strlen($mas) >=$max_lenght)
    {
        $max_lenght = strlen($mas);
    }

}
foreach ($mass as $mas) {
    $result_str = '';
    $i = 0;
    while($i<$max_lenght){
        if (isset($mas[$i])){
            $result_str .= $mas[$i];
        } else {
            $result_str = '+'.$result_str;

        }
        $i++;
    }
    var_dump($result_str);
}

$a = $a . $b;
$a .=  $b;
————-
$a = $b . $a