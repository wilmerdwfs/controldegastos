<?php  
session_start();

if ((time()-$_SESSION['activity']) < 140 ) {//it only closes when there is no activity
    $_SESSION['activity']=time();
}

if (!isset($_SESSION['user']) or (time()-$_SESSION['activity'])>140) {
   header("Location:/controlgastos/login.php"); 
}



