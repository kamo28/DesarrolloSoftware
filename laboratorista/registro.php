<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<body>
<?php 
    $con = mysqli_connect("localhost","root","","harina");
    $id_lote=$_GET['lote'];
    $ana=$_GET['anali'];
    $id_cliente=$_GET['cliente'];
    ?>
    <div class="top">
        <div class="bar white wide padding card">
          <a href="inicio.html" class="bar-item button"><span class="glyphicon glyphicon-signal"></span>Laboratorista</a>
          <div class="right ">
          <a href="#" class="bar-item button">Clientes</a>
            <a href="#" class="bar-item button">Equipo de laboratorio</a>
            <a href="ana_solicitados.php" class="bar-item button">Analisis Solicitados</a>
          </div>
        </div>
    </div>
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
       <h1>hhh</h1>
        <?php
        $sql="Select * from datos_analisis_cliente where ID_cliente='$id_cliente';";
        $result= mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)) {
            $clave_f=$row['Clave_factor'];

            $sql2="Select * from parametros_lab where Clave_factor_analisis='$clave_f';";       
            $result2= mysqli_query($con,$sql2);
            while($row2 = mysqli_fetch_array($result2)){
                echo " <label for='".$row2['Nombre_factor']."'><h4>".$row2['Nombre_factor']."(".$row2['Unidad_medida'].")</h4></label>";
                echo " <input type='number' class='form-control' name='".$row2['Nombre_factor']."'>";
            }
        }
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
        <?php
        $sql="Select * from datos_analisis_cliente where ID_cliente='$id_cliente';";
        $result= mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)) {
            $clave_f=$row['Clave_factor'];

            $sql2="Select * from parametros_lab where Clave_factor_analisis='$clave_f';";       
            $result2= mysqli_query($con,$sql2);
            while($row2 = mysqli_fetch_array($result2)){
                $nombre=$row2['Clave_factor_analisis'];
                echo " <label for='".$row2['Nombre_factor']."'><h4>".$row2['Nombre_factor']."(".$row2['Unidad_medida'].")</h4></label>";
                echo " <input type='number' class='form-control' name='$nombre'required >";
            }
        }
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
    <input type="submit" name="submit" value="Guardar resultados">
  </form>
    </div>
    </body>
</html>