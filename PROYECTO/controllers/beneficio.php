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
       $this->Cell(70,10,'Beneficios de la Plataforma Patria.',0,0,'C');
    }else if($_GET["docis"]  == "1"{
        $this->Cell(70,10,'Beneficio Protección Social de la Plataforma Patria.',0,0,'C');
    }else if($_GET["docis"]  == "2"{
        $this->Cell(70,10,'Beneficio Hogares de la Patria de la Plataforma Patria.',0,0,'C');
    }else if($_GET["docis"]  == "3"{
        $this->Cell(70,10,'Beneficio José Gregorio Hernández de la Plataforma Patria.',0,0,'C');
    }else if($_GET["docis"]  == "4"{
        $this->Cell(70,10,'Beneficio Economía Familiar de la Plataforma Patria.',0,0,'C');
    }else if($_GET["docis"]  == "5"{
        $this->Cell(70,10,'Beneficio 100% Familia de la Plataforma Patria.',0,0,'C');
    }else if($_GET["docis"]  == "6"{
        $this->Cell(70,10,'Beneficio Parto Humanisado de la Plataforma Patria.',0,0,'C');
    }else if($_GET["docis"]  == "7"{
        $this->Cell(70,10,'Beneficio Lactancia Materna de la Plataforma Patria.',0,0,'C');
    }else if($_GET["docis"]  == "8"{
        $this->Cell(70,10,'Sin Beneficios de la Plataforma Patria.',0,0,'C');
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
$beneficio = Datos::todoModel("beneficio");

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,'Cedula',1,0,'C');
$pdf->Cell(30,10,'Nombre',1,0,'C');
$pdf->Cell(30,10,'Apellido',1,0,'C');
$pdf->Cell(50,10,'Fecha de Nasimiento',1,0,'C');
$pdf->Cell(50,10,'Beneficio',1,1,'C');

$i=0;
$n=0;
while ($i < count($respuesta)){
    if ($_GET["odt"] == "*") {
        $pdf->Cell(30,10,"".$respuesta [$i][0],1,0,'C');
        $pdf->Cell(30,10,"".$respuesta [$i][1],1,0,'C');
        $pdf->Cell(30,10,"".$respuesta [$i][2],1,0,'C');
        $pdf->Cell(50,10,"".$respuesta [$i][3],1,0,'C');
        $a=0;
        while ($a < count($beneficio)){
            if($respuesta [$i][11] == $beneficio[$a][0]){
                $pdf->Cell(50,10,"".$beneficio [$a][1],1,1,'C');
            }                                                   
            $a++;
        }
        $n++;
    }else if ($_GET["odt"] == $respuesta[$i][11]) {
        $pdf->Cell(30,10,"".$respuesta [$i][0],1,0,'C');
        $pdf->Cell(30,10,"".$respuesta [$i][1],1,0,'C');
        $pdf->Cell(30,10,"".$respuesta [$i][2],1,0,'C');
        $pdf->Cell(50,10,"".$respuesta [$i][3],1,0,'C');
        $a=0;
        while ($a < count($beneficio)){
            if($respuesta [$i][11] == $beneficio[$a][0]){
                $pdf->Cell(50,10,"".$beneficio [$a][1],1,1,'C');
            }                                                   
            $a++;
        }
        $n++;
    }
    $i++;
}
$pdf->Cell(140,10,"Total ",1,0,'C');
$pdf->Cell(50,10,"".$n,1,1,'C');
$pdf->Output();
?>