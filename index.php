<!DOCTYPE html>

	<html>

	<head>

		<meta http-equiv="Content-Type" content="text/html" charset=UTF-8″ />

		<meta name="viewport" content="width=device-width, initial-scale=1">



		<link rel="stylesheet" type="text/css" href="assets/css/header.css">

	    <link rel="stylesheet" type="text/css" href="assets/css/saider.css">

	    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

	    <link rel="stylesheet" type="text/css" href="assets/css/container.css">

       <script src="components/Header.js"></script>
	   
	  





        <title>Gastos fast</title>

	</head>

	<body id="body">

        

        <?php require 'validations/session.php'; ?>

	    

        <header-header></header-header>

	   

        <?php require 'components/saider.php'; ?>

        

        <div id="container">



            <?php if(isset($_GET["m"])){ ?>

                

                <?php if($_GET["m"]=='categorias'){ ?>



                	    <?php if(isset($_GET["accion"])){ ?>



                	    	    <?php if($_GET["accion"]=='actualizar'){ ?>

                	    	    	  <?php  

                                       require_once 'http/categorys/actualizar.php';  

                                      ?>

           

                	    	    <?php } ?>

                                

                                <?php if($_GET["accion"]=='nuevo'){ ?>



                                	   <?php  

                                        

                                        require_once 'http/categorys/nuevo.php';  

                                        ?>



                	    	    <?php } ?>

 

                	    <?php } else { ?>

                	

                        	    <?php  

                                $cab = "Id,nombre, acciones";

                                require_once 'http/categorys/index.php';  

                                ?>

                        <?php } ?>

                       

             

                <?php } ?>



                <?php if($_GET["m"]=='gastos'){ ?>



                	    <?php if(isset($_GET["accion"])){ ?>



                	    	    <?php if($_GET["accion"]=='actualizar'){ ?>

                                       <?php  

                                        require_once 'http/invoices/actualizar.php';

                                        ?>

                                <?php } ?>





                	    	    <?php if($_GET["accion"]=='nuevo'){ ?>

                                        <?php  

                                        require_once 'http/invoices/nuevo.php';

                                        ?>

                                <?php } ?>

 

                	    <?php } else { ?>

                	

                        	    <?php  

                                $cab = "Id,nombre, acciones";

                                require_once 'http/invoices/index.php';  

                                ?>

                        <?php } ?>

                       

             

                <?php } ?>



                <?php if($_GET["m"]=='reports'){ ?>



                	    <?php if(isset($_GET["accion"])){ ?>



                

                	    	    <?php if($_GET["accion"]=='resport'){ ?>



                	    	    	   <?php  

                                        

                                        require_once 'httpss/invoices/nuevo.php';  

                                        ?>



                	    	    <?php } ?>

 

                	    <?php } else { ?>

                	

                        	    <?php  

                                $cab = "Id,nombre, acciones";

                                require_once 'http/reports/index.php';  

                                ?>

                        <?php } ?>

                       

             

                <?php } ?>



                  <?php if($_GET["m"]=='usuario'){ ?>



                        <?php if(isset($_GET["accion"])){ ?>



                

                                <?php if($_GET["accion"]=='actualizar'){ ?>



                                       <?php  

                                        

                                        require_once 'http/user/actualizar.php';  

                                        ?>



                                <?php } ?>

 

                        <?php }  ?>

        

                 <?php } ?>





                <?php if($_GET["m"]=='proveedores'){ ?>



                        <?php if(isset($_GET["accion"])){ ?>



                                <?php if($_GET["accion"]=='actualizar'){ ?>

                                      <?php  

                                       require_once 'http/proveedores/actualizar.php';  

                                      ?>

           

                                <?php } ?>

                                

                                <?php if($_GET["accion"]=='nuevo'){ ?>



                                       <?php  

                                        

                                        require_once 'http/proveedores/nuevo.php';  

                                        ?>



                                <?php } ?>

 

                        <?php } else { ?>

                    

                                <?php  

                                $cab = "Id,nombre, acciones";

                                require_once 'http/proveedores/index.php';  

                                ?>

                        <?php } ?>

                       

             

                <?php } ?>



                <?php if($_GET["m"]=='dashboard'){ ?>

                          

                        <?php  

                            require_once 'http/dashboard/index.php';  

                        ?>

        

                <?php } ?>



                <?php if($_GET["m"]=='login'){ ?>

                          

                        <?php  

                            require_once 'http/login/index.php';  

                        ?>

        

                <?php } ?>

            

            <?php } ?>



        <div>

	    

	    <script src="assets/js/js.js"></script>

	</body>

	</html>