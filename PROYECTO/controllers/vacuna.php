<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../views/css/icono.png',8,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(70);
    // Título
    if ($_GET["docis"]  == "*") {
       $this->Cell(70,10,'Docis Colocadas.',0,0,'C');
    }else{
        $this->Cell(70,10,'Vacunados con '.$_GET["docis"].' Docis.',0,0,'C');
    }
    // Salto de línea
    $this->Ln(40);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,5,'Pagina '.$this->PageNo().'/{nb}',0,1,'C');
    $this->Cell(0,5,'Comunidad Terrazas de Santo Domingo. Venezuela, Barinas, Municipio Bolivar.',0,0,'C');
}
}

// Creación del objeto de la clase heredada
require('../models/crud.php');

$respuesta = Datos::todoModel("persona");

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(40,10,'Cedula',1,0,'C');
$pdf->Cell(40,10,'Nombre',1,0,'C');
$pdf->Cell(40,10,'Apellido',1,0,'C');
$pdf->Cell(50,10,'Fecha de Nasimiento',1,0,'C');
$pdf->Cell(20,10,'Docis',1,1,'C');

$i=0;
$n=0;
while ($i < count($respuesta)){
    if ($_GET["docis"] == "*") {
        $pdf->Cell(40,10,"".$respuesta [$i][0],1,0,'C');
        $pdf->Cell(40,10,"".$respuesta [$i][1],1,0,'C');
        $pdf->Cell(40,10,"".$respuesta [$i][2],1,0,'C');
        $pdf->Cell(50,10,"".$respuesta [$i][3],1,0,'C');
        $pdf->Cell(20,10,"".$respuesta [$i][7],1,1,'C');
        $n++;
    }
    if ($_GET["docis"] == $respuesta[$i][7]) {
        $pdf->Cell(40,10,"".$respuesta [$i][0],1,0,'C');
        $pdf->Cell(40,10,"".$respuesta [$i][1],1,0,'C');
        $pdf->Cell(40,10,"".$respuesta [$i][2],1,0,'C');
        $pdf->Cell(50,10,"".$respuesta [$i][3],1,0,'C');
        $pdf->Cell(20,10,"".$respuesta [$i][7],1,1,'C');
        $n++;
    }
    $i++;
}
$pdf->Cell(120,10,"Total ",1,0,'C');
$pdf->Cell(70,10,"".$n,1,1,'C');
$pdf->Output();
?>