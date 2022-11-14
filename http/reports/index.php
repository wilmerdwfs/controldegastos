

<h1 id="titulo-opcion">REPORTES DINAMICOS</h1>
<div class="linea"></div>




           <form target="_blank" class="grupo-fila" method="post" action="http/reports/reports.php">
               
         
            <div class="grupo-campo">
                <label>Reporte</label>
                <select class="selectFrom" id="reporte" name="idCategoria">
                    <option value="1">Por categorias</option>
                    <option value="2">Por año</option>
                </select>
            </div>

            <div class="grupo-campo">
                <label>Fecha inicial</label>
                <input type="date" name="fechaIni">  
            </div>

            <div class="grupo-campo">
                <label>Fecha final</label>
                <input type="date" name="fechaFin">  
            </div>
            <button type="submit"  class="button">GENERAR</button>
    </form>


<link rel="stylesheet" type="text/css" href="assets/css/form.css">


