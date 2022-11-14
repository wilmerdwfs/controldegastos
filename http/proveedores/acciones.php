<?php 
require '../../http/adb/Adb.php';
 
$adb = new Adb();
$con = $adb->conectar();

$update  = "UPDATE `c_proveedores` 
                SET nombre=:nombre
           where id=:id ";

$insert = "INSERT INTO c_proveedores (nombre) VALUES (:nombre) ";

$delete = "DELETE from `c_proveedores` where id=:id";

if ($_POST['accion']=='actualizar') {

    $sth = $con->prepare($update);
    $sth->bindParam(":nombre", $_POST['nombre']);
    $sth->bindParam(":id", $_POST['id']);
    $sth->execute();
    require '../../components/success.php';
 
}

if ($_POST['accion']=='nuevo') {

    $sth = $con->prepare($insert);
    $sth->bindParam(":nombre", $_POST['nombre']);
    $sth->execute();
    require '../../components/success.php';
}


if ($_POST['accion']=='eliminar') {

    $sth = $con->prepare($delete);
    $sth->bindParam(":id", $_POST['id']);
    $sth->execute();
    require '../../components/success.php';
}


