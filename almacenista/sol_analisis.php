<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar analisis</title>
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
  include("../conexion.php");

 // Check connection
 if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
$error='<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>NÚMERO DE LOTE Ó ID CLIENTE VACIO!</strong></div>';
$envio='<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>ANALISIS SOLICITADO!</strong></div>';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["lote"]) || $_POST["cliente"]=="0" || $_POST["urgencia"]>1){
            echo $error;
        }  
        else{
            $fecha=date("Y-m-d");
            $cliente= $_POST["cliente"];
            $urgencia= $_POST["urgencia"];
            $lote=$_POST["lote"];
            $sql="INSERT INTO solicitud_analisis (ID_cliente,ID_lote,urgencia,estatus,f_emision) VALUES ($cliente,$lote,$urgencia,'en proceso',"."'".$fecha."'".");";
                if(mysqli_query($con,$sql)){
                    echo $envio;  
                };
        }
    }
?>
    <div class="top">
        <div class="bar white wide padding card">
          <a href="inicio.html" class="bar-item button"><span class="glyphicon glyphicon-th-list"></span>Almacenista</a>
          <div class="right ">
          <a href="estatus_ana.php" class="bar-item button">Estatus Análisis</a>
            <a href="#" class="bar-item button">Solicitar Análisis</a>
            <a href="certificados.php" class="bar-item button">Generar Certificados</a>
          </div>
        </div>
    </div>

    <div class="container" style="width: 95%;">
        <form action="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <br>
            <div class="form-group">
                <label for="fecha"><h4>Fecha:</h4></label>
                <input type="datetime" value="<?php echo date("Y-m-d");?>" disabled>
                <br>
            <label for="lote"><h4>ID Cliente:</h4></label>
                <select name="cliente" class="form-control">
                    <option value="0">-Selecciona el id cliente-</option>
                    <?php
                    $result = mysqli_query($con,"SELECT * FROM clientes;");
                    while($row = mysqli_fetch_array($result)) {
                        echo "<option value=".$row['ID_cliente'].">".$row['ID_cliente']."---".$row['Nombre_completo']."</option>";
                      }
                    ?>
                </select>
                <br>
                <label for="lote"><h4>Número de Lote:</h4></label>
                <input type="number" class="form-control" name="lote">
                <label for="lote"><h4>Pedido urgente?</h4></label><br>
                <input type="radio" class="form-check-input" name="urgencia" value="1" id="si">
                <label for="si">SI</label><br>
                <input type="radio" class="form-check-input" name="urgencia" value="0" id="no">
                <label for="no">NO</label>
            </div>
            
            <input type="submit"  class="btn btn-dark" name="submit"value="Mandar #Lote">
        </form>
    </div>
    </body>
</html>