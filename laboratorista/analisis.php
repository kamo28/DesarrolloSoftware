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
<?php
    $id=$_GET['seleccion'];
    $con = mysqli_connect("localhost","root","","harina");
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $inicial=$subsecuente=" ";
    $sql="Select * from solicitud_analisis where ID_solicitud = $id;";
    $result= mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $lote=$row['ID_lote'];
    $cliente=$row['ID_cliente'];
    $query="Select * from resultados_analisis where ID_lote=$lote";
    $resultado= mysqli_query($con,$query);
    $row2 = mysqli_fetch_array($resultado);
    if($row2==NULL){
        $analisis="Inicial";
    }
    else{
        $analisis="Subsecuente";
    }
?>
    <div class="container">
    <form action="registro.php" method="$_GET"> 
        <br>
        <label for="solicitud"><h4>Número de Solicitud:</h4></label>
        <input type="number" class="form-control" name="solicitud" value="<?php echo $id?>" readonly>
        <label for="lote"><h4>Número de Lote:</h4></label>
        <input type="number" class="form-control" name="lote" value="<?php echo $lote?>" readonly>
        <label for="cliente"><h4>ID Cliente:</h4></label>
        <input type="number" class="form-control" name="cliente" value="<?php echo $cliente?>" readonly>
        <label for="analisis"><h4>Tipo de Analisis:</h4></label><br>
        <input type="text" class="form-control" name="anali" value="<?php echo $analisis?>" readonly>
        <br>
        <input type="submit" name="submit" value="Registrar Análisis">
    </form><br>
    <form action="ana_solicitados.php">
        <input type="submit" name="submit" value="Regresar">
        </form>
    </div>
    </body>
</html>