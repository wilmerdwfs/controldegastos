<?php 


$adb = new Adb();



$con = $adb->conectar();



$fecha = "  ";



$hoy = date("d");

$mes = date("m");

$ano = date("Y");



$sql = 'SELECT 



            (select sum(aa.vlrTotal)  



                    from c_gastos aa 

                where aa.id > 0 and day(aa.fecha) = '.$hoy.'



            ) as totalHoy,



            (select count(aa.vlrTotal)  



                    from c_gastos aa 

                where aa.id > 0 and day(aa.fecha) = '.$hoy.'



            ) as countHoy,



            (select sum(aa.vlrTotal)  



                    from c_gastos aa 

                where aa.id > 0 and month(aa.fecha) = '.$mes.'



            ) as totalMes,



            (select count(aa.vlrTotal)  



                    from c_gastos aa 

                where aa.id > 0 and month(aa.fecha) = '.$mes.'



            ) as countMes,



            (select sum(aa.vlrTotal)  



                    from c_gastos aa 

                where aa.id > 0 and year(aa.fecha) = '.$ano.'



            ) as totalAno,



            (select count(aa.id)  



                    from c_gastos aa 

                where aa.id > 0 and year(aa.fecha) = '.$ano.'



            ) as countAno



            from c_gastos a 



        where a.id > 0 ';



$sth = $con->prepare($sql);

$sth->execute();

$datos = $sth->fetch();



$sql = 'SELECT sum(a.vlrTotal) as vlrTotal



        from c_gastos a 



        where a.id > 0 and year(a.fecha) = '.$ano.' group by month(a.fecha)  ';



$sth = $con->prepare($sql);

$sth->execute();

$datosGraf = $sth->fetchAll();

$datosGraf = json_encode($datosGraf);



?>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<div id="container-dashboard">

    <div class="caja-dashboard">

        <div class="caja">

            <h1>Gatos hoy</h1>

            <div class="desc">

                <h3># <?php echo number_format($datos['countHoy']) ?></h3>

                <p>Total: $ <?php echo number_format($datos['totalHoy']) ?> </p>

            </div>

        </div>

        <img src="assets/img/hoy.svg">

    </div>

    

    <div class="caja-dashboard">

        <div class="caja">

            <h1>Gatos por el mes</h1>

            <div class="desc">

                <h3># <?php echo number_format($datos['countMes']) ?></h3>

                <p>Total: $ <?php echo number_format($datos['totalMes']) ?></p>

            </div>

        </div>

        <img src="assets/img/mes.svg">

    </div>



    <div class="caja-dashboard">

        <div class="caja">

            <h1>Lo que va del año</h1>

            <div class="desc">

                <h3># <?php echo number_format($datos['countAno']) ?></h3>

                <p><?php echo number_format($datos['totalAno']) ?></p>

            </div>

        </div>

        <img src="assets/img/ano.svg">

    </div>

</div>

   

<canvas id="miChart"></canvas>



<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">



<script>

    

const 

ctx = document.getElementById('miChart');

 

const 

datosGraf = <?php echo $datosGraf ?>;



let 

grafo = [];



datosGraf.forEach((datos,index) => {

    grafo.push( datos.vlrTotal);

});



const 

data =  {

    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Obtubre', 'Noviembre', 'Diciembre'],

    datasets: [{

        label: 'Detalle de que lo que va del año',

        data: grafo,

        backgroundColor: [

            'rgba(255, 99, 132, 0.2)',

            'rgba(54, 162, 235, 0.2)',

            'rgba(255, 206, 86, 0.2)',

            'rgba(75, 192, 192, 0.2)',

            'rgba(153, 102, 255, 0.2)',

            'rgba(255, 159, 64, 0.2)'

        ],

        borderColor: [

            'rgba(255, 99, 132, 1)',

            'rgba(54, 162, 235, 1)',

            'rgba(255, 206, 86, 1)',

            'rgba(75, 192, 192, 1)',

            'rgba(153, 102, 255, 1)',

            'rgba(255, 159, 64, 1)'

        ],

        borderWidth: 1

    }]

};



const 

myChart = new Chart(ctx, {

    type: 'line',

    data: data,

});



</script>

 