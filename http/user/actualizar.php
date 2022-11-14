<?php 


$adb = new Adb();



$con = $adb->conectar();



$sql = 'select min(id), id, nombre, usuario,foto from c_user ';



$sth = $con->prepare($sql);

$sth->execute();



$datos = $sth->fetch();


?>



<h1 id="titulo-opcion">Usuario</h1>

<div class="linea"></div>





<form action="" class="formulario">

    

    <div id="container-user">  



        <div id="user">



            <img src="<?php echo $datos['foto']  ?>" id="foto-user">

          

        </div>

        <div id="container-file">

            <button id="btn-file-upload">CARGAR ARCHIVO</button>

            <input type="file" id="file-foto" >

            <img src="assets/img/subir.svg">

        </div>



     

        

     </div>

      <div class="grupo-columna">

        

           <input type="text" id="txtNombre" value="<?php echo $datos['nombre']?>" placeholder="Nombre" readonly="readonly"> 

           <input type="text" id="txtUsuario" value="<?php echo $datos['usuario']?>" placeholder="Usuario" readonly="readonly">
           <input type="password" id="txtPassword"  placeholder="Contraseña" class="sin-margen-derecho" readonly="readonly">


        </div>

       



  



    <div id="respuesta"></div>

      

    <div class="container-button">

        <button type="button" onclick="updateUser()" class="button">GUARDAR</button> 

    </div>



</form>



<link rel="stylesheet" type="text/css" href="assets/css/form.css">

<link rel="stylesheet" type="text/css" href="assets/css/user.css">



<script type="text/javascript">



    function updateUser(){



        const xhttp     = new XMLHttpRequest();

        let formData    = new FormData();

        let txtNombre   =  document.getElementById("txtNombre").value;

        let txtUsuario  =  document.getElementById("txtUsuario").value;

        let txtPassword =  document.getElementById("txtPassword").value;

        let fileFoto    =  document.getElementById("foto-user");



        formData.append("nombre",txtNombre);

        formData.append("usuario",txtUsuario);

        formData.append("password",txtPassword);

        formData.append("foto",fileFoto.src);

        formData.append("id",1);

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

        

        xhttp.open("post", "http/user/acciones.php?", true);

        xhttp.send(formData);

    

    }

    const containerFoto  = document.getElementById("file-foto");

containerFoto.addEventListener('change', async function(){
    const base64URL = await encodeFileAsBase64URL(this.files[0]);
    fotoUser.objectFit = "cover";
    fotoUser.setAttribute('src', base64URL);
    fotoUser.height = '200';
    fotoUser.width = '140';
});

async function encodeFileAsBase64URL(file) {
    return new Promise((resolve) => {
        const reader = new FileReader();
        reader.addEventListener('loadend', () => {
            resolve(reader.result);
        });
        reader.readAsDataURL(file);
    });
};

</script>



