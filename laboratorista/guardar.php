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
$con = mysqli_connect("localhost","root","","harina");
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
$insertar="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','aspecto','$aspecto','-');";
$insertar2="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','color','$color','-');";
$insertar3="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','olor','$olor','-');";
$insertar4="INSERT INTO resultados VALUES ($solicitud,$lote,'$inspeccion','sabor','$sabor','-');";

mysqli_query($con,$insertar);
mysqli_query($con,$insertar2);
mysqli_query($con,$insertar3);
mysqli_query($con,$insertar4);

$estatus="UPDATE solicitud_analisis SET estatus ='finalizado' WHERE ID_solicitud=$solicitud";
if($band=="true"){
    $sql= "INSERT INTO resultados_analisis VALUES ($lote,'$inspeccion','$f_emision');";
    $band="false";
}
if(mysqli_query($con,$sql)){
    if(mysqli_query($con,$estatus)){
       echo $inex;
    }
}
$sqlcli="Select * from solicitud_analisis where ID_solicitud='$solicitud';";
$resultado= mysqli_query($con,$sqlcli);
$rows = mysqli_fetch_array($resultado);
$cliente=$rows['ID_cliente'];
include("ana_solicitados.php");
//guardar resultados
$sql3="Select * from datos_analisis_cliente where ID_cliente='$cliente';";
$result= mysqli_query($con,$sql3);
        while($row = mysqli_fetch_array($result)) {
            $clave_f=$row['Clave_factor'];
            $sql2="Select * from parametros_lab where Clave_factor_analisis='$clave_f';";       
            $result2= mysqli_query($con,$sql2);
            while($row2 = mysqli_fetch_array($result2)){
                $factor=$row2['Clave_factor_analisis'];
                $nomre= $row2['Nombre_factor'];
                $resultado= $_GET["$factor"];
                $unidad=$row2['Unidad_medida'];
                $query="INSERT INTO resultados VALUES($solicitud,$lote,'$inspeccion','$nomre',$resultado,'$unidad');";
                mysqli_query($con,$query);

            }
        }
?>
</body>
</html>