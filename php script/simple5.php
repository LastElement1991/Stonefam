<?php
//name
function srt_name(string $name, int $length_name): string
{
    $str = '';
    $i = 0;
    while ($i < $length_name) {
        $str .= $name[$i];
        $i++;
        if ($name[$i] == '') {
            while ($i < $length_name) {
                $str .= ' ';
                $i++;
            }
        }
    }
    return $str;
}

//airport
function srt_air($air, $length_air): string
{
    $str_air = '';
    $i = 0;
    while ($i < $length_air) {
        $str_air .= $air[$i];
        $i++;
    }
    if ($str_air != $air) {
        echo "Ты мне дичь втираешь  - $air";
        die;
    }
    return $str_air;
}

//echo "Name - ";
//$name=readline('');
$name = 'Вадимка';
$name = srt_name($name, 6);
//echo "Surname - ";
//$surn=readline('');
$surn = 'Vadimkaaaaa';
$surn = srt_name($surn, 6);
//echo "Airport departure - ";
//$dep=readline('');
$dep = srt_air($dep, 3);
//echo "Airport arrival - ";
//$arr = readline('');
$arr = srt_air($arr, 3);
print_r($name . "/////////////////");
echo "
 ╔═════════════╦══════════════╦══════════════════════╗
 ║ Фамилия     ║ $surn       ║                      ║
 ║ Имя         ║ $name       ║                      ║ 
 ╠═════════════╬══════════════╬══════════╦═══════════╣ 
 ║ Отправление ║ $dep          ║ Прибытие ║ $arr       ║
 ╚═════════════╩══════════════╩══════════╩═══════════╝
";