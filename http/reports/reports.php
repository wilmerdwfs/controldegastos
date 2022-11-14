<?php 
require '../../http/adb/Adb.php';
 
$adb = new Adb();

$con = $adb->conectar();

$fecha = "  ";

if ($_POST['fechaIni']!='') {

	$fecha = " and a.fecha between ".$_POST['fechaIni']." and ".$_POST['fechaFin']."  ";

}

$sql = 'SELECT a.*, b.nombre as nomCategoria , 

               (select sum(aa.vlrTotal)  from c_gastos aa where aa.idCategoria= a.idCategoria) as totalCat,
               (select sum(aa.vlrTotal)  from c_gastos aa where year(aa.fecha) = year(a.fecha)) as totalAno

            from c_gastos a 
                inner join c_categorias b on b.id = a.idCategoria 

        where a.id > 0 '.$fecha." order by a.idCategoria";

$sth = $con->prepare($sql);
$sth->execute();
$datos = $sth->fetchAll();

require_once('../../lib/TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);

$pdf->SetFont('dejavusans', '', 14, '', true);

$pdf->AddPage();

$pdf->SetXY(10, 10);

$pdf->Image('../../assets/img/logo-pdf.png', '', '', 50, 10, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

$pdf->SetXY(10, 26);

$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$id = 0;
$fecha = '';

if($_POST['idCategoria']==1)
{

    $pdf->Cell(0, 0, 'GASTOS POR CATEGORIAS', 0, 0, 'C', 0, '', 0);
    
    foreach($datos as $dato) {

        $txt = $dato['nomCategoria'];
    
        if ($dato['idCategoria']!=$id) {

            $id = $dato['idCategoria'];

            $pdf->SetTextColor(0, 0, 0);

            $pdf->Ln();
            $pdf->Ln();

            $pdf->MultiCell(130, 5,$txt, 0, 'L', 1, 0, '', '', true);
            $pdf->Cell(50, 0, ' $ '.number_format($dato['totalCat']), 1, 0, 'L', 0, '', 0);
            $pdf->Ln();
            
            $pdf->Cell(30, 0, 'FECHA', 1, 0, 'L', 0, '', 0);
            $pdf->Cell(50, 0, 'CANTIDAD', 1, 0, 'L', 0, '', 0);
            $pdf->Cell(50, 0, 'VALOR', 1, 0, 'L', 0, '', 0);
            $pdf->Cell(50, 0, 'TOTAL', 1, 0, 'L', 0, '', 0);
        }
        
        $pdf->Ln();
        
        $pdf->SetTextColor(71, 186, 224);
        $pdf->SetFont('','',12); 
        $pdf->Cell(30, 0,$dato['fecha'], 1, 0, 'R', 0, '', 0);
        $pdf->Cell(50, 0,number_format($dato['cantidad']), 1, 0, 'R', 0, '', 0);
        $pdf->Cell(50, 0,'$ '.number_format($dato['valor']), 1, 0, 'R', 0, '', 0);
        $pdf->Cell(50, 0, number_format($dato['vlrTotal']), 1, 0, 'R', 0, '', 0);
    }

}

if($_POST['idCategoria']==2)
{
  
    $pdf->Cell(0, 0, 'GASTOS POR AÑO', 0, 0, 'C', 0, '', 0);

    foreach($datos as $dato) {

        $txt = $dato['fecha'];
    
        if ($dato['fecha']!=$fecha) {

            $fecha = $dato['fecha'];

            $pdf->SetTextColor(0, 0, 0);
            
            $pdf->Ln();
            $pdf->Ln();

            $pdf->MultiCell(130, 5,$txt, 0, 'L', 1, 0, '', '', true);
            $pdf->Cell(50, 0, ' $ '.number_format($dato['totalAno']), 1, 0, 'L', 0, '', 0);
            
            $pdf->Ln();
      
            $pdf->Cell(50, 0, 'CANTIDAD', 1, 0, 'L', 0, '', 0);
            $pdf->Cell(50, 0, 'VALOR', 1, 0, 'L', 0, '', 0);
            $pdf->Cell(50, 0, 'TOTAL', 1, 0, 'L', 0, '', 0);
        }

        $pdf->SetTextColor(0, 0, 0);
        
        $pdf->Ln();
        
        $pdf->SetFont('','',12); 
        
        $pdf->MultiCell(130, 5,$dato['nomCategoria'], 0, 'L', 1, 0, '', '', true);
        
        $pdf->Ln();
        
        $pdf->SetTextColor(71, 186, 224);
        
        $pdf->Cell(50, 0,number_format($dato['cantidad']), 1, 0, 'R', 0, '', 0);
        $pdf->Cell(50, 0,'$ '.number_format($dato['valor']), 1, 0, 'R', 0, '', 0);
        $pdf->Cell(50, 0, '$ '.number_format($dato['vlrTotal']), 1, 0, 'R', 0, '', 0);

    }

}

$pdf->Output('reporte_de_gastos.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>
