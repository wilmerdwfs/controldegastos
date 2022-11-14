    <?php 



            require 'http/adb/Adb.php';



            $adb = new Adb();



            $con = $adb->conectar();

            $sql = "select * from c_user where usuario='".$_SESSION['user']."'";

            $sth = $con->prepare($sql);

            $sth->execute();



            $datos = $sth->fetch();



    ?>



		  <div id="saider" class="responsive">

      

          <div id="header-saider">

                <div id="container-headline">



                    <div id="logo">

                        C

                    </div>

                

                   <p id="title-logo">

                        CONTROLGASTOS

                   </p>



                </div>

                <img id="icon-cerrar-responsive" style="width:30px" src="assets/img/x.svg">

          </div>



		      <div id="header-saider-avatar">

               <div id="avatar">

                  <img  src="<?php echo $datos['foto']?>">

               </div>

		        <p id="users">Maria Fernanda</p>

		      </div>

              <nav id="nav">

                <ul id="list-nav">

                  <a href="index.php?m=dashboard" class="opcion-menu">

                   <img src="assets/img/dasboard.svg">

                   Dasboard

                  </a>

                  <a href="index.php?m=categorias" class="opcion-menu" id="category">

                   <img src="assets/img/category.svg">

                  Categorias</a>

                  <a href="index.php?m=proveedores" class="opcion-menu" id="provider">

                       <img src="assets/img/provider.svg">

                       Proveedores</a>

                  <a href="index.php?m=gastos" class="opcion-menu" id="invoice">

                     <img src="assets/img/invoice.svg">

                  Gastos</a>

                  <a href="index.php?m=reports" class="opcion-menu" id="report">

                       <img src="assets/img/reports.svg">

                       Repotes</a>

                </ul>

              </nav>

		  </div>

  

