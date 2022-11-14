<?php 

$adb = new Adb();



$con = $adb->conectar();



?>



<h1 id="titulo-opcion">NUEVAS CATEGORIAS</h1>

<div class="linea"></div>



<form action="" class="formulario">

    <div class="grupo-1">

        <div class="grupo-campo">

            <label>Cantida</label>

            <input type="text" id="txtNombre" placeholder="Nombre">

        </div>

    </div>

    <div id="respuesta"></div>

      

    <div class="container-button">

        <button type="button"  id="btnGuardar" class="button">GUARDAR</button> 

    </div>



</form>



<div class="container-to-back">



    <a href="index.php?m=categorias" class="to-back">

        <img src="assets/img/icon-to-back.svg">

    </a>



</div>



<link rel="stylesheet" type="text/css" href="assets/css/form.css">





<script type="text/javascript">



    btnGuardar = document.getElementById("btnGuardar");



    btnGuardar.addEventListener('click',() => {



        const xhttp = new XMLHttpRequest();

        let formData = new FormData();

        let txtNombre =  document.getElementById("txtNombre").value;

        

        formData.append("nombre",txtNombre);

        formData.append("id",0);

        formData.append("accion",'nuevo');



        xhttp.onreadystatechange = function() {

          

            if (this.readyState == 4 && this.status == 200) {

              

                document.getElementById("respuesta").innerHTML = xhttp.responseText;



                setTimeout(function(){

                   

                    respuesta = document.querySelector(".success");

                    respuesta.style.display='none';

                   window.location.href="index.php?m=categorias"

                },1000);



            }

        };

        

        xhttp.open("post", "http/categorys/acciones.php?", true);

        xhttp.send(formData);

    

    

    });



</script>



