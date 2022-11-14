<?php

class Adb {

	function conectar(){
       
       try {

		  $con = new PDO('mysql:host=localhost;dbname=cualquira','root','');
		  $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		  return $con;

	   } catch (PDOException $e) {
           print "¡Error!: " . $e->getMessage() . "<br/>";
          die();
       }

	}
}
