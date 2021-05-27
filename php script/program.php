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
 	$mass = file_get_contents('users.json');
$info = json_encode($mass);
$mass = json_decode($info);
print_r($mass);
if( $mass!= false){
    foreach($info as $result ){
        echo  $result ;
    }
}
 }
 elseif ($x == '2'){
 echo "Please enter login\n";
$login = readline();
echo "Please enter password\n";
$password = readline();
$str = ',{
   "login": "'.$login.'",
   "password": "'.$password.'",
   "role": "user"
 }
';
file_put_contents('users.json',$str, FILE_APPEND | LOCK_EX );
system('clear');
 }

else {
system('exit');	
}

$mass = file_get_contents('users.json', true);
$info = explode("\n", $mass);
 foreach($info as $result ){
print_r($result);
die;
   }
