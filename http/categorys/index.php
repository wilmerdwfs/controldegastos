<?php 



$adb = new Adb();



$con = $adb->conectar();

$sql = 'select * from c_categorias';

$sth = $con->prepare($sql);

$sth->execute();



$datos = $sth->fetchAll();

?>



<h1 id="titulo-opcion">CATEGORIAS</h1>

<div class="linea"></div>



<div class="container-table">

<?php 

$lin = new stdClass();

$lin = "index.php?m=categorias&accion=nuevo";

require 'components/options_index.php'; ?>


<div id="respuesta"></div>

<?php  

$cab = "Id,nombre, acciones";

require 'components/tableheader.php';  

?>



<?php  foreach ($datos as $dato) { ?>



    <tr id="fila<?php echo $dato['id'] ?>">

    	<td><?php echo $dato['id'] ?></td>

    	<td><?php echo $dato['nombre'] ?></td>

    	<td>

    		<div class="acciones">

                <div class="accion">

                    <a href="index.php?m=categorias&accion=actualizar&id=<?php echo $dato['id'] ?>">

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

        

        xhttp.open("post", "http/categorys/acciones.php?", true);

        xhttp.send(formData);

    

    }

</script>



<link rel="stylesheet" type="text/css" href="assets/css/table.css">



