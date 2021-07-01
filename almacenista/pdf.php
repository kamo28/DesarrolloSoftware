<?php
require('fpdf/fpdf.php');

// $user ="root";
// $password="root";
// $host="localhost";
// $port="3307";
// $db="harina";
// $link = mysqli_init();
// $conn = mysqli_real_connect($link,$host,$user,$password,$db,$port);

// if (mysqli_connect_errno()) {
// echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }

// $con=mysqli_connect($host,$user,$password,$db,$port);

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

$ID = $_GET["IDD"];

$query="SELECT Limite_inf from datos_analisis_cliente WHERE ID_cliente = $ID";
$resultado= mysqli_query($con,$query);
$x=0;
while($row = mysqli_fetch_array($resultado)){
    $lim_inf[$x]=$row['Limite_inf'];
    $x++;
}

$query1="SELECT Limite_sup from datos_analisis_cliente WHERE ID_cliente = $ID";
$resultado1= mysqli_query($con,$query1);
$y=0;
while($row1 = mysqli_fetch_array($resultado1)){
    $lim_sup[$y]=$row1['Limite_sup'];
    $y++;
}



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
$pdf->CELL(50,5,utf8_decode($lim_inf[0].'-'.$lim_sup[0]),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('TIEMPO DE DESARROLLO:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($tiempo),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($lim_inf[1].'-'.$lim_sup[1]),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('ESTABILIDAD:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($estabilidad),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($lim_inf[2].'-'.$lim_sup[2]),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('AFLOJAMIENTO:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($aflojamiento),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($lim_inf[3].'-'.$lim_sup[3]),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('QUALITY NUMBER:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($quality),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($lim_inf[4].'-'.$lim_sup[4]),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('TENACIDAD:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($tenacidad),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($lim_inf[5].'-'.$lim_sup[5]),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('EXTENSIBILIDAD:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($extensibilidad),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($lim_inf[6].'-'.$lim_sup[6]),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('ENERGIA DE LA HARINA:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($energia),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($lim_inf[7].'-'.$lim_sup[7]),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('RELACION DE LA CONFIGURACION '),0,0,'L',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('DE LA CURVA:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($relacion),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($lim_inf[8].'-'.$lim_sup[8]),0,0,'C',0);
$pdf->Ln();
$pdf->CELL(90,5,utf8_decode('INDICE DE ELASTICIBIDAD:'),0,0,'L',0);
$pdf->CELL(30,5,utf8_decode($indice),0,0,'C',0);
$pdf->CELL(50,5,utf8_decode($lim_inf[9].'-'.$lim_sup[9]),0,0,'C',0);
$pdf->Ln();

//ancho,alto,txto, 
$pdf->Output();
?>
