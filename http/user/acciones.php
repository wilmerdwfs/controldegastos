<?php 

require '../../http/adb/Adb.php';

 

$adb = new Adb();

$con = $adb->conectar();



if ( $_POST['password']=='') {

       $password = "";

}else{

    $password = ",password=:password";

}



$update  = "UPDATE `c_user` 

                SET nombre=:nombre,

                    usuario=:usuario,

                    foto=:foto

                    $password 

           where id=:id ";



if ($_POST['accion']=='actualizar') {



    $sth = $con->prepare($update);



    $sth->bindParam(":nombre", $_POST['nombre']);

    $sth->bindParam(":usuario", $_POST['usuario']);

    $sth->bindParam(":foto", $_POST['foto']);



    $password = md5($_POST['password']);



    if ( $_POST['password']!='') {

        $sth->bindParam(":password",$password);

    }

    $sth->bindParam(":id", $_POST['id']);

    $sth->execute();

    require '../../components/success.php';

 

}

