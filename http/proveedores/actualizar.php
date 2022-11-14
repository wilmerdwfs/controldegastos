<?php 


$adb = new Adb();



$con = $adb->conectar();

$id = $_GET['id'];



$sql = 'select id, nombre from c_proveedores where id='.$id;



$sth = $con->prepare($sql);

$sth->execute();



$datos = $sth->fetch();



?>



<h1 id="titulo-opcion">ACTUALIZAR PROVEEDORES</h1>

<div class="linea"></div>



<form action="" class="formulario">

    

    <div class="grupo-1">

        <div class="grupo-campo">

            <label>Nombre</label>  

            <input type="text" id="txtNombre" value="<?php echo $datos['nombre']?>" placeholder="Nombre">

        </div>

    </div>



    <div id="respuesta"></div>

      

    <div class="container-button">

        <button type="button" onclick="updateProveedores()" class="button">GUARDAR</button> 

    </div>



</form>



<div class="container-to-back">



    <a href="index.php?m=proveedores" class="to-back">

        <img src="assets/img/icon-to-back.svg">

    </a>



</div>



<link rel="stylesheet" type="text/css" href="assets/css/form.css">



<?php

  $id = 0;

  if (isset($_GET['id'])) {

      $id = $_GET['id'];

  }



?>



<script type="text/javascript">



    function updateProveedores(){



        const xhttp = new XMLHttpRequest();

        let formData = new FormData();

        const id = "<?php echo $id ?>";

        let txtNombre =  document.getElementById("txtNombre").value;

        

        formData.append("nombre",txtNombre);

        formData.append("id",id);

        formData.append("accion",'actualizar');



        xhttp.onreadystatechange = function() {

          

            if (this.readyState == 4 && this.status == 200) {

              

                document.getElementById("respuesta").innerHTML = xhttp.responseText;



                setTimeout(function(){

                   

                    respuesta = document.querySelector(".success");

                    respuesta.style.display='none';



                },2000);



            }

        };

        

        xhttp.open("post", "http/proveedores/acciones.php?", true);

        xhttp.send(formData);

    

    }

</script>



