<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<body>

    <div class="top">
        <div class="bar white wide padding card">
          <a class="bar-item button"><span class="glyphicon glyphicon-th-list"></span>Analista</a>
          <div class="right ">
            <a href="estatus_ana.php" class="bar-item button">Estatus Análisis</a>
            <a href="sol_analisis.php" class="bar-item button">Solicitar Análisis</a>
            <a href="certificados.php" class="bar-item button">Certificados</a>
          </div>
        </div>
    </div>
    <div class="container" style="width: 95%;">
    <h3>Generar Certificado</h3>
        <form action="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <br>
            <div class="form-group">
            <label for="lote"><h4>Cliente</h4></label>
                <input type="number" class="form-control" name="lote">
                <br>
            </div>
            
            <input type="submit" name="submit"value="Mandar #Lote">
        </form>
    </body>
</html>