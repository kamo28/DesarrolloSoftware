<?php
    require "../header.php"
?>
<head>
    <title>Generar certificados</title>
</head>
<style>
    .bar{width:100%;overflow:hidden}
    .bar .bar-item{padding:8px 16px;float:left;width:auto;border:none;display:block;outline:0}
    .bar .button{white-space:normal}
    .button:hover{color:#000!important;background-color:#ccc!important}
    .top,.bottom{position:static;width:100%;z-index:1}.top{top:0}.bottom{bottom:0}
    .white,.white:hover{color:#000!important;background-color:#fff!important}
    .wide{letter-spacing:4px}
    .padding{padding:8px 16px!important}
    .card{box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)}
    .right{float:right!important}
    .hide-small{display:none!important}
    a{background-color:transparent;color: black;font-size: large;}a:active,a:hover{outline-width:0}
</style>
    <!-- Button group -->
    <div class="container">
        <div class='wrapper text-center'>
            <div class="btn-group btn-group-lg">
                <a class="btn btn-primary" href="certificados.php" role="button">Buscar resultados análisis</a>
                <a class="btn btn-primary btn-lg active"  aria-pressed="true" href="generar_c.php" role="button">Generar certificado</a>
            </div>
        </div>
    </div><br>

    <div class="container" style="width: 95%;">
    <h3><strong>Generar Certificado</strong></h3>
    <form action="pdf.php" method="$_POST">
    <?php
        $lote=$_GET['lote'];
        $cliente=$_GET['cliente'];
        include("../include/conexion.php");
        $solicitud="Select * from solicitud_analisis where ID_cliente=$cliente and ID_lote=$lote ORDER BY f_emision DESC;";
        $resultado= mysqli_query($con,$solicitud);
        $dato_sol = mysqli_fetch_array($resultado);
        $num_sol=$dato_sol['ID_solicitud'];
        $inspeccion="Select * from resultados_analisis where id_solicitud=$num_sol;";
        $resultadoi= mysqli_query($con,$inspeccion);
        $ins = mysqli_fetch_array($resultadoi);
        $num_i=$ins['Numero_inspeccion']
    ?><br>
    <h3><u> Datos Certificado:</u></h3>
    <label for="compra"><h4>Orden de compra:</h4></label>
    <input type="number" class="form-control" name="compra">
    <label for="cant_s"><h4>Catidad Solicitada:</h4></label>
    <input type="number" class="form-control" name="cant_s">
    <label for="cant_t"><h4>Catidad Total por Entrega:</h4></label>
    <input type="number" class="form-control" name="cant_t">
    <label for="factura"><h4>Número de Factura:</h4></label>
    <input type="number" class="form-control" name="factura">
    <label for="lote"><h4>Número de lote:</h4></label>
    <input type="number" class="form-control" name="lote" value="<?php echo $lote?>" readonly>
    <label for="cant_t"><h4>Catidad Total por Entrega:</h4></label>
    <input type="number" class="form-control" name="cant_t">
    <label for="inspeccion"><h4>Número de inspección:</h4></label>
    <input type="text" class="form-control" name="inspeccion" value="<?php echo $num_i ?>" readonly>
    <label for="fecha_p"><h4>Fecha de Producción:</h4></label>
    <input type="date" class="form-control" name="fecha_p">
    <label for="fecha_c"><h4>Fecha de Caducidad:</h4></label>
    <input type="date" class="form-control" name="fecha_c">

    <br>
    <h3><u> Datos Cliente:</u></h3>
    <?php 
     $clientes="Select * from clientes where ID_cliente=$cliente;";
     $result= mysqli_query($con,$clientes);
     $datos_c = mysqli_fetch_array($result);
     echo " <label for='nombre'><h4>Nombre Completo</h4></label><input type='text' class='form-control' name='nombre' value='".$datos_c['Nombre_completo']."'readonly>";
     echo " <label for='RFC'><h4>RFC</h4></label><input type='text' class='form-control' name='RFC' value='".$datos_c['RFC']."'readonly>";
     echo " <label for='Domicilio'><h4>Domicilio</h4></label><input type='text' class='form-control' name='domicilio' value='".$datos_c['Domicilio']."'readonly>";
    ?>   
    <br>
    <h3><u> Pruebas de laboratorio:</u></h3>
    <?php 
     $organo="Select * from resultados where id_solicitud=$num_sol and ID_lote=$lote and Analisis='$num_i';";
     $resultados= mysqli_query($con,$organo);
     while($datos = mysqli_fetch_array($resultados)){
        echo " <label for='".$datos['Nombre_analisis']."'><h4>".$datos['Nombre_analisis']."</h4></label><input type='text' class='form-control' name='aspecto' value='".$datos['resultado']."'readonly>";
     }
    ?>   <br><br>
    <input type="submit" class="btn btn-dark" name="submit"value="Generar PDF">
    <br>
    </form>
    </body>
</html>