<?php
    require "../header.php"
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacenista</title>
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
                <a class="btn btn-primary btn-lg active"  aria-pressed="true" href="estatus_ana.php" role="button">Estatus Análisis</a>
                <a class="btn btn-primary" href="sol_analisis.php" role="button">Solicitar análisis</a>
                <a class="btn btn-primary" href="certificados.php" role="button">Certificados</a>
                <a class="btn btn-primary" href="generar_c.php" role="button">Generar certificado</a>
            </div>
        </div>
    </div><br>

    <div class="container">
        <h3>Análisis Solicitados</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID cliente</th>
                    <th>ID lote</th>
                    <th>Estatus de Anélisis</th>
                    <th>Fecha de emisión</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("../conexion.php");
                    if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    $sql="Select * from solicitud_analisis order by estatus ASC;";
                    $result= mysqli_query($con,$sql);
                    while($row = mysqli_fetch_array($result)) {
                    $estado=$row['estatus'];
                    if($estado=="en proceso"){
                        echo "<tr class='alert alert-info'>"."<td>".$row['ID_cliente']."</td><td>".$row['ID_lote']."</td><td>".$row['estatus']."</td><td>".$row['f_emision']."</td></tr>";
                    }
                    else if ($estado=="finalizado"){
                        echo "<tr class='alert alert-success'>"."<td>".$row['ID_cliente']."</td><td>".$row['ID_lote']."</td><td>".$row['estatus']."</td><td>".$row['f_emision']."</td></tr>";
                    }
                    }
                ?>
            </tbody>
        </table>
    </div>
    </body>
</html>