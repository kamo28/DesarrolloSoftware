
<?php
require('fpdf/fpdf.php');

include("../include/conexion.php");
$con = OpenCon();

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(90,20,'Nombre de la empresa',0,2,'C');
    $this->Cell(90,10,'Certificado de Analisis',0,2,'C');
    $this->Cell(90,10,'Producto',1,2,'C');
    $this->Cell(90,15,'Solicitado por:',0,2,'C');
    $this->Cell(90,10,'Cliente',1,2,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$query01 = "SELECT Nombre_factor,Limite_inf,Limite_sup FROM parametros_lab WHERE Clave_factor_analisis = 1";
                        $result_res01=mysqli_query($con,$query01);  



$pdf = new PDF();
$pdf -> AliasNbPAges();
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
while ($row01 = mysqli_fetch_array($result_res01)) { 
    $Abs = $row01[0]; $liminf1 = $row01[1]; $limsup1 = $row01[2]; 
}

$pdf->CELL(90,5,utf8_decode('ORDEN	DE	COMPRA	NÚMERO:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('CANTIDAD	SOLICITADA:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('CANTIDAD	TOTAL	POR	ENTREGA:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('NÚMERO	DE	FACTURA:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('NÚMERO	DE	LOTE:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('NÚMERO	DE	INSPECCIÓN:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('FECHA DE	PRODUCCIÓN:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('FECHA	DE	CADUCIDAD:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,10,utf8_decode('CARACTERÍSTICAS ORGANOLÉPTICAS'),1,0,'C',0);
$pdf->CELL(30,10,utf8_decode('RESULTADOS'),1,0,'C',0);
$pdf->CELL(50,10,utf8_decode('ESTANDAR:'),1,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('ASPECTO	FÍSICO:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('COLOR:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('OLOR:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('SABOR:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,10,utf8_decode('PRUEBAS	FISICOQUÍMICAS'),1,0,'C',0);
$pdf->CELL(30,10,utf8_decode('RESULTADOS'),1,0,'C',0);
$pdf->CELL(50,10,utf8_decode('Especificación	interna'),1,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,8,utf8_decode('HUMEDAD:'),0,0,'L',0);
$pdf->Ln();
$pdf->Ln();
$pdf->CELL(90,10,utf8_decode('GRANULOMETRIA:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('MALLA #20:'),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('MALLA #30:'),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('MALLA #40:'),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('BASE:'),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,10,utf8_decode('MATERIA	EXTRAÑA:'),0,0,'L',0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->CELL(90,5,utf8_decode('Vomitoxinas:'),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('Aflatoxinas:'),0,0,'L',0);


//ancho,alto,txto, 
$pdf->Output();
?>
