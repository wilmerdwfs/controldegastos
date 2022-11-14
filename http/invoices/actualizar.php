<?php 


$adb = new Adb();



$con = $adb->conectar();



$sql = 'select * from c_categorias  ';

$sth = $con->prepare($sql);

$sth->execute();



$datos = $sth->fetchAll();





$sql = 'select * from c_proveedores  ';

$sth = $con->prepare($sql);

$sth->execute();



$datosProv = $sth->fetchAll();



$id = $_GET['id'];



$sql = 'select * from c_gastos where id='.$id;

$sth = $con->prepare($sql);

$sth->execute();

$datosC = $sth->fetch();



?>



<h1 id="titulo-opcion">ACTUALIZAR GASTO</h1>

<div class="linea"></div>



<form action="" class="formulario">

    <div class="grupo-3">

          <div class="grupo-campo">

                <label>Fecha</label>

                <input type="date" id="txtFecha" value="<?php echo $datosC['fecha'] ?>">

            </div>

         <div class="grupo-campo">

      <label>Proveedor</label>

    <select class="select" id="idProveedor" name="selectProveedor">



        <?php foreach($datosProv as $dato){ ?>

               <?php $selected = ''?>

               <?php if($datoC['idProveedor']==$dato['id'])?>

                 <?php $selected = 'selected'?>



            <option <?php echo $selected = 'selected'?> value="<?php echo $dato['id'] ?>">

                <?php echo $dato['nombre'] ?>

             </option>



        <?php } ?>

       

    </select>

    </div>



      <div class="grupo-campo">

              <label>Categoria</label>

    <select class="select" id="idCategoria" name="select">



        <?php foreach($datos as $dato){ ?>

            <?php $selected = ''?>

            <?php if($datoC['idCategoria']==$dato['id'])?>

                 <?php $selected = 'selected'?>



            <option value="<?php echo $dato['id'] ?>" <?php echo $selected = 'selected'?>> 

                <?php echo $dato['nombre'] ?>

            </option>

        <?php } ?>

       

    </select>

        </div>

    </div>

    <div class="grupo-3">

            <div class="grupo-campo">

                <label>Cantida</label>

                <input type="number" id="txtCantidad" class="calcular" value="<?php echo $datosC['cantidad'] ?>">

            </div>

            <div class="grupo-campo">

                  <label>Valor</label>

                  <input type="number" id="txtValor" 

                  class="calcular" value="<?php echo $datosC['valor'] ?>">

            </div>



            <div class="grupo-campo">

                <label>Total</label>

                <input type="number" id="txtTotal" value="<?php echo $datosC['vlrTotal'] ?>" readonly>

            </div>

    </div>

  



    <div id="respuesta"></div>

      

    <div class="container-button">

        <button type="button"  id="btnGuardar" class="button">GUARDAR</button> 

    </div>



</form>



<div class="container-to-back">



    <a href="index.php?m=gastos" class="to-back">

        <img src="assets/img/icon-to-back.svg">

    </a>



</div>



<link rel="stylesheet" type="text/css" href="assets/css/form.css">





<script type="text/javascript">



    btnGuardar = document.getElementById("btnGuardar");



    btnGuardar.addEventListener('click',() => {



        const xhttp = new XMLHttpRequest();



        let formData = new FormData();

        let idProveedor =  document.getElementById("idProveedor").value;

        let idCategoria =  document.getElementById("idCategoria").value;

        let txtCantidad =  document.getElementById("txtCantidad").value;

        let txtValor =  document.getElementById("txtValor").value;

        let txtTotal =  document.getElementById("txtTotal").value;

        let txtFecha =  document.getElementById("txtFecha").value;

        if(txtFecha = '')
        {
          
            document.getElementById("respuesta").innerHTML = "<div class='message-info'><p>Digite una fecha</p></div>";

            document.getElementById("txtValor").focus;
            
            return 0;
        }

        if(txtCantidad <= 0 || txtCantidad=='')
        {
            document.getElementById("respuesta").innerHTML = "<div class='message-info'><p> Digite la cantidad </p></div>";

            document.getElementById("txtCantidad").focus;

            return 0;
         
        }

        if(txtValor <= 0 || txtValor=='')
        {
          
            document.getElementById("respuesta").innerHTML = "<div class='message-info'><p>Digite un valor</p></div>";

            document.getElementById("txtValor").focus;
            
            return 0;
        }

        
        formData.append("fecha",txtFecha);

        formData.append("idProveedor",idProveedor);

        formData.append("idCategoria",idCategoria);

        formData.append("cantidad",txtCantidad);

        formData.append("valor",txtValor);

        formData.append("vlrTotal",txtTotal);

        formData.append("id",<?php echo $id ?>);

        formData.append("accion",'actualizar');



        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                document.getElementById("respuesta").innerHTML = xhttp.responseText;

                

                setTimeout(function(){

                   

                    respuesta = document.querySelector(".success");

                    respuesta.style.display='none';

                    window.location.href="index.php?m=gastos"



                },1000);

            }

        };

        

        xhttp.open("post", "http/invoices/acciones.php?", true);

        xhttp.send(formData);

    });

   

    const calcular = document.querySelectorAll(".calcular");

   

    let total = 0;

   

    for (var i = 0; calcular.length > i; i++) {

        calcular[i].addEventListener('keyup',function(){

            total = calcular[0].value * calcular[1].value;

            document.getElementById("txtTotal").value = total;

        });

    }

        

</script>

