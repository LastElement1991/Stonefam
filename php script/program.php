<?php
echo "1. Login\n";
echo "2. Registration\n";
echo "3. Exit\n";
$x = readline();

system('clear');
if ($x == '1')
 {
echo "Please enter login\n";
$login = readline();
echo "Please enter password\n";
$password = readline();
 $result = file_get_contents('users.json');
$json = json_decode($result, true);
foreach($json as $result ){
if( $result = ['login'] !== $login ){
    echo "Пользователь не найден в системе"."\n";

    }

}
 }
 else if ($x == '2'){
 echo "Please enter login\n";
$login = readline();
echo "Please enter password\n";
$password = readline();
$role = 'user';
$mass =  array (
'role' => $role,
'login' => $login,
'password' => $password
);
$json = json_encode($mass,JSON_PRETTY_PRINT);
$json = ",".$json."]";
$str = file_get_contents('users.json');
$json = str_replace("]", $json, $str);
file_put_contents('users.json',$json);
system('clear');
 }

else {
system('exit');	
}