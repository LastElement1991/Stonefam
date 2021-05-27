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
//foreach($json as $result ){
  //      echo  $result ;

if( $json = ['login'] !== $login ){
    echo "Пользователь не найден в системе";

    }

 }
 elseif ($x == '2'){
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
$json = json_encode($mass);
file_put_contents('users.json',$json, FILE_APPEND | LOCK_EX );
system('clear');
 }

else {
system('exit');	
}