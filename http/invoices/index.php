<?php 


$adb = new Adb();



$con = $adb->conectar();

$sql = 'select a.*, b.nombre as nomCategoria,

                    c.nombre as nomProveedor from c_gastos a 

                      inner join c_categorias b on b.id = a.idCategoria 

                      inner join c_proveedores  c on c.id = a.idProveedor';

$sth = $con->prepare($sql);

$sth->execute();



$datos = $sth->fetchAll();

?>



<h1 id="titulo-opcion">GASTOS</h1>

<div class="linea"></div>



<div id="respuesta"></div>



<div class="container-table">

<?php

$lin = new stdClass();

$lin = "index.php?m=gastos&accion=nuevo";

require 'components/options_index.php'; ?>

<?php  

$cab = "Id,Categoria,Proveedor,Cantidad,Valor,Total, acciones";

require 'components/tableheader.php';  ?>

<?php  foreach ($datos as $dato) { ?>



    <tr id="fila<?php echo $dato['id'] ?>">

    	<td><?php echo $dato['id'] ?></td>

    	<td><?php echo $dato['nomCategoria'] ?></td>

        <td><?php echo $dato['nomProveedor'] ?></td>

        <td><?php echo $dato['cantidad'] ?></td>

        <td> $ <?php echo number_format($dato['valor']) ?></td>

        <td> $ <?php echo number_format($dato['vlrTotal']) ?></td>

        <td>

    		<div class="acciones">

                <div class="accion">

                    <a href="index.php?m=gastos&accion=actualizar&id=<?php echo $dato['id'] ?>">

                        <img src="assets/img/edit.svg">

                   </a>

                </div>



                <div class="accion">

                    <a onclick="eliminar(<?php echo $dato['id'] ?>)">

                       <img src="assets/img/delete.svg">

                    </a>

                </div>

            </div>

        </td>

    </tr>



<?php  } ?>

<?php  require 'components/tablefooter.php';  ?>



</div>



<link rel="stylesheet" type="text/css" href="assets/css/table.css">





<script type="text/javascript">



    function eliminar(id){



        const xhttp = new XMLHttpRequest();

        let formData = new FormData();

    

        formData.append("id",id);

        formData.append("accion",'eliminar');



        xhttp.onreadystatechange = function() {

          

            if (this.readyState == 4 && this.status == 200) {

              

                document.getElementById("respuesta").innerHTML = xhttp.responseText;



                fila = document.getElementById("fila"+id);

                fila.style.display='none';



                setTimeout(function(){

                   

                    respuesta = document.querySelector(".success");

                    respuesta.style.display='none';



                },2000);



            }

        };

        

        xhttp.open("post", "http/invoices/acciones.php?", true);

        xhttp.send(formData);

    

    }

</script>