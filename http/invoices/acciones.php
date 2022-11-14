<?php 

require '../../http/adb/Adb.php';

$adb = new Adb();

$con = $adb->conectar();



$update  = "UPDATE `c_gastos` 

                SET idCategoria=:idCategoria,

                    idProveedor=:idProveedor,

                    valor=:valor,

                    cantidad=:cantidad,

                    vlrTotal=:vlrTotal,

                    fecha=:fecha

           where id=:id ";



$insert = "INSERT INTO c_gastos (idProveedor,idCategoria,valor,cantidad,vlrTotal,fecha) VALUES (:idProveedor,:idCategoria,:valor,:cantidad,:vlrTotal,:fecha) ";

$delete = "DELETE from `c_gastos` where id=:id";

if ($_POST['accion']=='actualizar') {


    $sth = $con->prepare($update);

    $sth->bindParam(":idCategoria", $_POST['idCategoria']);

    $sth->bindParam(":idProveedor", $_POST['idProveedor']);

    $sth->bindParam(":valor", $_POST['valor']);

    $sth->bindParam(":cantidad", $_POST['cantidad']);

    $sth->bindParam(":vlrTotal", $_POST['vlrTotal']);
   
    $sth->bindParam(":fecha", $_POST['fecha']);

    $sth->bindParam(":id", $_POST['id']);

    $sth->execute();



    require '../../components/success.php';

 

}



if ($_POST['accion']=='nuevo') {


print_r($_POST);

    $sth = $con->prepare($insert);

    $sth->bindParam(":idCategoria", $_POST['idCategoria']);

    $sth->bindParam(":idProveedor", $_POST['idProveedor']);

    $sth->bindParam(":valor", $_POST['valor']);

    $sth->bindParam(":cantidad", $_POST['cantidad']);

    $sth->bindParam(":vlrTotal", $_POST['vlrTotal']);
    
    $sth->bindParam(":fecha", $_POST['fecha']);

    $sth->execute();



    require '../../components/success.php';

}





if ($_POST['accion']=='eliminar') {



    $sth = $con->prepare($delete);

    $sth->bindParam(":id", $_POST['id']);

    $sth->execute();



    require '../../components/success.php';

}



