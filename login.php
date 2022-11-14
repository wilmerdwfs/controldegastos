<!DOCTYPE html>
	<html>
	<head>

		<meta http-equiv="Content-Type" content="text/html" charset=UTF-8″ />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="assets/css/login.css">

        <title>Control de gastos</title>

	</head>

	<body id="body">
	    <div id="container-login">
            <form id="form-login">
                <h1>COTROL DE GASTOS</h1>  
                <label>Usuario</label>
                <input type="" name="textUser" id="txtUser">
                <label>Contraseña</label> 
                <input type="password" type="" id="txtPassword" name="password">
                <div id="respuesta"></div>
                <button type="button" id="btnEntrar">ENTRAR</button>
            </form>
        <div>
	</body>

    <script type="text/javascript">

    	const btnEntrar = document.getElementById('btnEntrar');
        
        btnEntrar.addEventListener('click', () => {

        	const user = document.getElementById('txtUser').value;
            const password = document.getElementById('txtPassword').value;

            formData = new FormData();
            formData.append('user',user);
            formData.append('password',password);

            if(user.length==0)
            {

                document.getElementById('respuesta').innerHTML = 'Digite el usuario <br/><br/>';
                document.getElementById('txtUser').focus();
                document.getElementById('txtUser').style="background-color: #EDF5FF";
                return 0;
            }

            if(password.length==0)
            {

                document.getElementById('respuesta').innerHTML = 'Digite la contraseña <br/><br/>';
                document.getElementById('txtPassword').focus();
                document.getElementById('txtPassword').style="background-color: #EDF5FF";

                return 0;
      
            }

            const xhttp = new XMLHttpRequest();
            
            xhttp.onreadystatechange = function(){

    		    if(this.readyState == 4 && this.status == 200){
                    
                    setTimeout(function(){
 
                        if(xhttp.responseText=='0'){

                        	document.getElementById('respuesta').innerHTML = 'Usuario o  contraseña icorrectos <br/><br/>';

                        }else{

                            window.location.href = '/controlgastos/index.php?m=dashboard';
                        }
                    	 
                    },1000)
                        
                }else{
    		        document.getElementById('respuesta').innerHTML = 'Enviando petición <br/><br/>';
    		    }
    	    }

    	    xhttp.open('post','http/login/acciones.php',true);
         	xhttp.send(formData);
               
        });
   
    </script>
    
    </html>