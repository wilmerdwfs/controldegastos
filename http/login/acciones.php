<?php 
require '../../http/adb/Adb.php';
 
$adb = new Adb();
$con = $adb->conectar();

$select  = "SELECT  usuario, nombre FROM `c_user` 
            WHERE usuario=:usuario AND password=:password";

$sth = $con->prepare($select );
$password = md5($_POST['password']);
$sth->bindParam(":usuario", $_POST['user']);
$sth->bindParam(":password", $password);
$sth->execute();
$datos = $sth->fetch();

if ($datos) {
   session_start();
   $_SESSION['user'] = $datos['usuario'];
   $_SESSION['activity'] = time();
   
   echo '1';
}else{
  echo '0';
}

 

