<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoristas</title>
</head>
<body>
<?php

$inex='<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>ANÁLISIS INSERTADO CORRECTAMENTE!</strong></div>';
$band=true;
include("../include/conexion.php");
$con = OpenCon();
//guardar analisis
$lote=$_GET['lote'];
$band="true";
$inspeccion= $_GET['ins'];
$f_emision= $_GET['fecha'];
$solicitud=$_GET['solicitud'];
$aspecto=$_GET['aspecto'];
$color=$_GET['color'];
$olor=$_GET['olor'];
$sabor=$_GET['sabor'];
$absorcion=$_GET['absorcion'];
$tiempo=$_GET['tiempo'];
$estabilidad=$_GET['estabilidad'];
$aflojamiento=$_GET['aflojamiento'];
$quality=$_GET['quality'];
$tenacidad=$_GET['tenacidad'];
$extensibilidad=$_GET['extensibilidad'];
$energia=$_GET['energia'];
$curva=$tenacidad/$extensibilidad;
$elasticidad=$_GET['elasticidad'];

$insertar="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','aspecto','$aspecto','');";
$insertar2="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','color','$color','');";
$insertar3="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','olor','$olor','');";
$insertar4="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','sabor','$sabor','');";
//pruebas
$insertar5="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','absorcion de agua','$absorcion','%');";
$insertar6="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','tiempo de desarrollo','$tiempo','minutos');";
$insertar7="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','estabilidad','$estabilidad','minutos');";
$insertar8="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','aflojamiento','$aflojamiento','UF');";
$insertar9="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','quality number','$quality','');";
$insertar10="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','tenacidad','$tenacidad','P mm');";
$insertar11="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','extensibilidad','$extensibilidad','L mm');";
$insertar12="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','energia de la harina','$energia','W Jules');";
$insertar13="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','Relación de la configuración de la curva','$curva','P/L');";
$insertar14="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','Índice de elasticidad','$elasticidad','I.E.');";

mysqli_query($con,$insertar);
mysqli_query($con,$insertar2);
mysqli_query($con,$insertar3);
mysqli_query($con,$insertar4);
mysqli_query($con,$insertar5);
mysqli_query($con,$insertar6);
mysqli_query($con,$insertar7);
mysqli_query($con,$insertar8);
mysqli_query($con,$insertar9);
mysqli_query($con,$insertar10);
mysqli_query($con,$insertar11);
mysqli_query($con,$insertar12);
mysqli_query($con,$insertar13);
mysqli_query($con,$insertar14);


$estatus="UPDATE solicitud_analisis SET estatus ='finalizado' WHERE ID_solicitud=$solicitud";
if($band=="true"){
    $sql= "INSERT INTO resultados_analisis VALUES ($solicitud,$lote,'$inspeccion','$f_emision');";
    $band="false";
}
if(mysqli_query($con,$sql)){
    if(mysqli_query($con,$estatus)){
       echo $inex;
    }
    else echo "estatus";
}
include("ana_solicitados.php");
?>
</body>
</html>
