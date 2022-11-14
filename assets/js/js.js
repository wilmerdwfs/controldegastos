document.getElementById("container-icon-menu").addEventListener('click',hidenSaider);



const body    = document.getElementById("body");

const side    = document.getElementById("saider"); 

const users   = document.getElementById("users"); 

const user   = document.getElementById("user"); 

const titleLogo = document.getElementById("title-logo"); 

const containerIconUser    = document.getElementById("container-icon-user");

const close  = document.getElementById("close");



const foto  = document.getElementById("foto");

const fileFoto  = document.getElementById("file-foto");

const fotoUser  = document.getElementById("foto-user");

const iconCerrarResponsive  = document.getElementById("icon-cerrar-responsive");



function hidenSaider() {



    if(side.offsetWidth==0)

    {

        

        side.classList.toggle('saider-recoger');



    }else{

      

       body.classList.toggle("remove-width-body");

       side.classList.toggle("remove-width-side");

       users.classList.toggle("without-visibility");

       titleLogo.classList.toggle("without-display");



    }

}



iconCerrarResponsive.addEventListener('click',function(){

    side.classList.toggle('saider-recoger');

});



containerIconUser.addEventListener('click',function(){

    close.classList.toggle('with-display-flex');

});



containerIconUser.addEventListener('click',function(){

    close.classList.toggle('with-display-flex');

});

function searchDataTable () {



    // Declare variables

    let input, filter, table, tr, td, i, txtValue;

    inptSeach  = document.getElementById("inptSeach");

    filter =   inptSeach.value.toUpperCase();

    table  =   document.getElementById("myTable");

    tr     =   table.getElementsByTagName("tr");



    // Loop through all table rows, and hide those who don't match the search query

    for (let i = 0; i < tr.length; i++) {

  

        let  td = tr[i].getElementsByTagName("td");

     

        for (let j = 0; j <  td.length; j++) {



            let field = tr[i].getElementsByTagName("td")[j];



            txtValue = field.textContent || field.innerText;



            if (txtValue.toUpperCase().indexOf(filter) > -1) {



                tr[i].style.display = "";

                break;

              

            } else {



                tr[i].style.display = "none";



            }



        }



    }



} 



const closeSession = document.getElementById('close-session');


closeSession.addEventListener('click',() => {

    xhttp = new XMLHttpRequest();

    setTimeout(function(){

            location.href = 'login.php';

    },2000);

    xhttp.open('post','http/login/close_session.php',true);

    xhttp.send();

});



