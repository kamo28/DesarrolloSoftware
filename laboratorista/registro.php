<?php
    require "../header.php"
?>
<head>
    <title>Registrar Análisis</title>
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
    <?php 
     include("../include/conexion.php");
    $id_lote=$_GET['lote'];
    $ana=$_GET['anali'];
    $id_cliente=$_GET['cliente'];
    ?>

    <!-- Button group -->
    <div class="container">
        <div class='wrapper text-center'>
            <div class="btn-group btn-group-lg">
                <a class="btn btn-primary" href="ana_solicitados.php" role="button">Análisis solicitados</a>
                <a class="btn btn-primary" href="analisis.php" role="button">Análisis</a>
                <a class="btn btn-primary btn-lg active"  aria-pressed="true" href="registro.php" role="button">Registro</a>
            </div>
        </div>
    </div><br>

    <div class="container">
    <h3> Resultado Analisis <?php echo $ana?></h3>
    <?php 
    if($ana == "Subsecuente"){
    ?>

    <br><h4><strong>ÚLTIMO ANÁLISIS</strong></h4>
    <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID lote</th>
                    <th>Número de inspección</th>
                    <th>Fecha de realización</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $con = mysqli_connect("localhost","root","","harina");
                $solicitud=$_GET['solicitud'];
                if (mysqli_connect_errno()) {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $sql="Select * from resultados_analisis where id_lote=$id_lote ORDER BY Numero_inspeccion  DESC;";
                $result= mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);
                echo "<tr class='info'><td>".$row['ID_lote']."</td><td>".$row['Numero_inspeccion']."</td><td>".$row['f_realizacion']."</td></tr>";
                if($row['Numero_inspeccion']=="A"){
                    $insp="value='B'";  
                }
                else if($row['Numero_inspeccion']=="B"){
                    $insp="value='C'";
                }
                else if($row['Numero_inspeccion']=="C"){
                    $insp="value='D'";
                }
                else if($row['Numero_inspeccion']=="D"){
                    $insp="value='E'";
                }
                else if($row['Numero_inspeccion']=="E"){
                    $insp="value='F'";
                }
                else if($row['Numero_inspeccion']=="F"){
                    $insp="value='G'";
                }
                else if($row['Numero_inspeccion']=="G"){
                    $insp="value='H'";
                }
                else if($row['Numero_inspeccion']=="H"){
                    $insp="value='I'";
                }

                ?>
            </tbody>
    </table>
    <form method="GET" action="guardar.php">
        <label for="solicitud"><h4>Solicitud:</h4></label>
        <input type="text" class="form-control" name="solicitud" value="<?php echo $_GET['solicitud'] ?>" readonly>
        <label for="lote"><h4>Lote:</h4></label>
        <input type="number" class="form-control" name="lote" value="<?php echo $_GET['lote'] ?>" readonly>
        <label for="ins"><h4>Inspección:</h4></label>
        <input type="text" class="form-control" name="ins" <?php echo $insp?> readonly>
        <label for="fecha"><h4>Fecha:</h4></label>
        <input type="datetime"class='form-control' name="fecha" value="<?php echo date("Y-m-d");?>" readonly>
       <h1>PRUEBAS FISICOQUÍMICAS</h1>
       <h2><u>Farinógrafo</u></h2>
       <label for="absorcion"><h4> Absorción de agua (%):</h4></label>
        <input type="text" class="form-control" name="absorcion" required>
        <label for="tiempo"><h4>Tiempo de desarrollo (minutos):</h4></label>
        <input type="text" class="form-control" name="tiempo" required>
        <label for="estabilidad"><h4>Estabilidad (minutos):</h4></label>
        <input type="text" class="form-control" name="estabilidad" required>
        <label for="aflojamiento"><h4> Aflojamiento (UF):</h4></label>
        <input type="text" class="form-control" name="aflojamiente" required>
        <label for="quality"><h4> Quality Number:</h4></label>
        <input type="text" class="form-control" name="quality" required>
        <h2><u>Alveografo</u></h2>
        <label for="tenacidad"><h4> Tenacidad(P mm):</h4></label>
        <input type="text" class="form-control" name="tenacidad" required>
        <label for="extensibilidad"><h4>Extensibilidad (L mm):</h4></label>
        <input type="text" class="form-control" name="extensibilidad" required>
        <label for="energia"><h4>Energía de la harina (W Jules):</h4></label>
        <input type="text" class="form-control" name="energia" required>
        <label for="curva"><h4>  Relación de la configuración de la curva (P/L):</h4></label>
        <input type="text" class="form-control" name="curva" required>
        <label for="elasticidad"><h4> Índice de elasticidad (I.E):</h4></label>
        <input type="text" class="form-control" name="elasticidad" required>
        <?php
    }
    else{
        ?>
        <form method="GET" action="guardar.php">
        <label for="solicitud"><h4>Solicitud:</h4></label>
        <input type="number" class="form-control" name="solicitud" value="<?php echo $_GET['solicitud'] ?>" readonly>
        <label for="lote"><h4>Lote:</h4></label>
        <input type="number" class="form-control" name="lote" value="<?php echo $_GET['lote'] ?>" readonly>
        <label for="ins"><h4>Inspección:</h4></label>
        <input type="text" class="form-control" name="ins" value="A" readonly>
        <label for="fecha"><h4>Fecha:</h4></label>
        <input type="datetime"class='form-control' name="fecha" value="<?php echo date("Y-m-d");?>" readonly>
        <h1>PRUEBAS FISICOQUÍMICAS</h1>
       <h2><u>Farinógrafo</u></h2>
       <label for="absorcion"><h4> Absorción de agua (%):</h4></label>
        <input type="text" class="form-control" name="absorcion" required>
        <label for="tiempo"><h4>Tiempo de desarrollo (minutos):</h4></label>
        <input type="text" class="form-control" name="tiempo" required>
        <label for="estabilidad"><h4>Estabilidad (minutos):</h4></label>
        <input type="text" class="form-control" name="estabilidad" required>
        <label for="aflojamiento"><h4> Aflojamiento (UF):</h4></label>
        <input type="text" class="form-control" name="aflojamiento" required>
        <label for="quality"><h4> Quality Number:</h4></label>
        <input type="text" class="form-control" name="quality" required>
        <h2><u>Alveografo</u></h2>
        <label for="tenacidad"><h4> Tenacidad(P mm):</h4></label>
        <input type="text" class="form-control" name="tenacidad" required>
        <label for="extensibilidad"><h4>Extensibilidad (L mm):</h4></label>
        <input type="text" class="form-control" name="extensibilidad" required>
        <label for="energia"><h4>Energía de la harina (W Jules):</h4></label>
        <input type="text" class="form-control" name="energia" required>
        <label for="curva"><h4>  Relación de la configuración de la curva (P/L):</h4></label>
        <input type="text" class="form-control" name="curva" required>
        <label for="elasticidad"><h4> Índice de elasticidad (I.E):</h4></label>
        <input type="text" class="form-control" name="elasticidad" required>
        <?php
    }
    ?>
    <br><h4><strong>PRUEBAS ORGANOLÉPTICAS</strong></h4>
    <label for="aspector"><h4>Aspecto físico:</h4></label>
    <input type="text" class="form-control" name="aspecto" required>
    <label for="color"><h4>Color:</h4></label>
    <input type="text" class="form-control" name="color" required>
    <label for="olor"><h4>Olor:</h4></label>
    <input type="text" class="form-control" name="olor" required>
    <label for="sabor"><h4>Sabor:</h4></label>
    <input type="text" class="form-control" name="sabor" required>
    <br><br>
    <input type="submit" name="submit" class="btn btn-dark" value="Guardar resultados">
  </form>
    </div>
    </body>
</html>