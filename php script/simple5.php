<?php
//name
function srt_name($name,$lenght)
{
    $str='';
    $i = 0;
    while ($i<$lenght) {
        $str.= $name[$i];
        $i++;
    }
    if ($i<$lenght){
        while ($i<$lenght){
            $str.= " ";
            $i++;
        }
    }
    return $str;
}
//airport
function srt_air($name,$lenght)
{
    $str_air = '';
    $i = 0;
    while ($i < $lenght) {
            $str_air .= $name[$i];
            $i++;
//        switch ($i) {
//            case 4:
//                echo "err";
//                break;
//        }
    }
    if ($str_air!= $name) {
        echo "err";
        die;
    }

    return $str_air;
}

$name='Vadim1001231';
$name = srt_name ($name,6);
$surn='Cherner342';
$surn = srt_name ($surn,6);
$dep='MOW';
$dep = srt_air ($dep,3);
$arr = 'SIP123';
$arr = srt_air ($arr,3);
echo "
 ╔═════════════╦══════════════╦══════════════════════╗
 ║ Фамилия     ║ $surn       ║                      ║
 ║ Имя         ║ $name       ║                      ║ 
 ╠═════════════╬══════════════╬══════════╦═══════════╣ 
 ║ Отправление ║ $dep          ║ Прибытие ║ $arr       ║
 ╚═════════════╩══════════════╩══════════╩═══════════╝
";