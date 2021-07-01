<?php
require('fpdf/fpdf.php');

include("../include/conexion.php");
$con = OpenCon();

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $nombre = $_GET["nombre"];
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->Cell(90,20,'Molinos del Atlantico S.A.S',0,2,'C');
    $this->Cell(90,10,'Certificado de Analisis',0,2,'C');
    $this->Cell(90,10,'Harina de Trigo',1,2,'C');
    $this->Cell(90,15,'Solicitado por:',0,2,'C');
    $this->Cell(90,10,$nombre,1,2,'C');
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






$pdf = new PDF();
$pdf -> AliasNbPAges();
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);

$orden = $_GET["compra"];
$cantidads = $_GET["cant_s"];
$cantidadt = $_GET["cant_t"];
$factura =$_GET["factura"];
$lote = $_GET["lote"];
$inspeccion = $_GET["inspeccion"];
$produccion = $_GET["fecha_p"];
$caducidad = $_GET["fecha_c"];
$aspecto = $_GET["aspecto"];
$color = $_GET["color"];
$olor = $_GET["olor"];
$sabor = $_GET["sabor"];

$absorcion = $_GET["absorcion_de_agua"];
$tiempo = $_GET["tiempo_de_desarrollo"];
$estabilidad = $_GET["estabilidad"];
$aflojamiento = $_GET["aflojamiento"];
$quality = $_GET["quality_number"];
$tenacidad = $_GET["tenacidad"];
$extensibilidad = $_GET["extensibilidad"];
$energia = $_GET["energia_de_la_harina"];
$relacion = $_GET["Relación_de_la_configuración_de_la_curva"];
$indice = $_GET["Índice_de_elasticidad"];

$query="SELECT Limite_inf from parametros_lab WHERE Clave_factor_analisis = 1";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$a1 = $datos[0];}
$query="SELECT Limite_inf from parametros_lab WHERE Clave_factor_analisis = 2";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$a2 = $datos[0];}
$query="SELECT Limite_inf from parametros_lab WHERE Clave_factor_analisis = 3";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$a3 = $datos[0];}
$query="SELECT Limite_inf from parametros_lab WHERE Clave_factor_analisis = 4";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$a4 = $datos[0];}
$query="SELECT Limite_inf from parametros_lab WHERE Clave_factor_analisis = 5";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$a5 = $datos[0];}
$query="SELECT Limite_inf from parametros_lab WHERE Clave_factor_analisis = 6";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$a6 = $datos[0];}
$query="SELECT Limite_inf from parametros_lab WHERE Clave_factor_analisis = 7";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$a7 = $datos[0];}
$query="SELECT Limite_inf from parametros_lab WHERE Clave_factor_analisis = 8";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$a8 = $datos[0];}
$query="SELECT Limite_inf from parametros_lab WHERE Clave_factor_analisis = 9";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$a9 = $datos[0];}
$query="SELECT Limite_inf from parametros_lab WHERE Clave_factor_analisis = 10";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$a10 = $datos[0];}

$query="SELECT Limite_sup from parametros_lab WHERE Clave_factor_analisis = 1";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$b1 = $datos[0];}
$query="SELECT Limite_sup from parametros_lab WHERE Clave_factor_analisis = 2";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$b2 = $datos[0];}
$query="SELECT Limite_sup from parametros_lab WHERE Clave_factor_analisis = 3";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$b3 = $datos[0];}
$query="SELECT Limite_sup from parametros_lab WHERE Clave_factor_analisis = 4";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$b4 = $datos[0];}
$query="SELECT Limite_sup from parametros_lab WHERE Clave_factor_analisis = 5";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$b5 = $datos[0];}
$query="SELECT Limite_sup from parametros_lab WHERE Clave_factor_analisis = 6";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$b6 = $datos[0];}
$query="SELECT Limite_sup from parametros_lab WHERE Clave_factor_analisis = 7";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$b7 = $datos[0];}
$query="SELECT Limite_sup from parametros_lab WHERE Clave_factor_analisis = 8";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$b8 = $datos[0];}
$query="SELECT Limite_sup from parametros_lab WHERE Clave_factor_analisis = 9";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$b9 = $datos[0];}
$query="SELECT Limite_sup from parametros_lab WHERE Clave_factor_analisis = 10";
$resultado= mysqli_query($con,$query);
while($datos = mysqli_fetch_array($resultado)){$b10 = $datos[0];}


$pdf->CELL(90,5,utf8_decode('ORDEN	DE	COMPRA	NÚMERO:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($orden),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('CANTIDAD	SOLICITADA:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($cantidads),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('CANTIDAD	TOTAL	POR	ENTREGA:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($cantidadt),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('NÚMERO	DE	FACTURA:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($factura),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('NÚMERO	DE	LOTE:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($lote),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('NÚMERO	DE	INSPECCIÓN:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($inspeccion),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('FECHA DE	PRODUCCIÓN:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($produccion),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('FECHA	DE	CADUCIDAD:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($caducidad),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,10,utf8_decode('CARACTERÍSTICAS ORGANOLÉPTICAS'),1,0,'C',0);
$pdf->CELL(30,10,utf8_decode('RESULTADOS'),1,0,'C',0);
$pdf->CELL(50,10,utf8_decode('ESTANDAR:'),1,0,'C',0);
$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->CELL(90,5,utf8_decode('ASPECTO	FÍSICO:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($aspecto),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode('POLVO (LIBRE DE INSECTOS)'),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('COLOR:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($color),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode('BLANCA O CREMA'),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('OLOR:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($olor),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode('PROPIO,LIGERO,AGRADABLE'),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('SABOR:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($sabor),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode('ALMIDONOSO'),0,0,'C',0);
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->CELL(90,10,utf8_decode('PRUEBAS GENERALES'),1,0,'C',0);
$pdf->CELL(30,10,utf8_decode('RESULTADOS'),1,0,'C',0);
$pdf->CELL(50,10,utf8_decode('Especificación	interna'),1,0,'C',0);
$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->CELL(90,5,utf8_decode('ABSORCIÓN DE AGUA:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($absorcion),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($a1.'-'.$b1),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('TIEMPO DE DESARROLLO:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($tiempo),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($a2.'-'.$b2),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('ESTABILIDAD:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($estabilidad),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($a3.'-'.$b3),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('AFLOJAMIENTO:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($aflojamiento),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($a4.'-'.$b4),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('QUALITY NUMBER:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($quality),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($a5.'-'.$b5),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('TENACIDAD:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($tenacidad),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($a6.'-'.$b6),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('EXTENSIBILIDAD:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($extensibilidad),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($a7.'-'.$b7),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('ENERGIA DE LA HARINA:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($energia),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($a8.'-'.$b8),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('RELACION DE LA CONFIGURACION '),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('DE LA CURVA:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($relacion),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($a9.'-'.$b9),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('INDICE DE ELASTICIBIDAD:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($indice),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($a10.'-'.$b10),0,0,'C',0);
$pdf->Ln();

//ancho,alto,txto, 
$pdf->Output();
?>
