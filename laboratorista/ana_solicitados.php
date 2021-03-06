<?php
    require "../header.php"
?>
<head>
    <title>Solicitudes de análisis</title>
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
                <a class="btn btn-primary btn-lg active"  aria-pressed="true" href="ana_solicitados.php" role="button">Análisis solicitados</a>
            </div>
        </div>
    </div><br>

    <div class="container">
        <h3>Análisis Solicitados</h3>
        <form  method="GET" action="analisis.php"> 
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID Solicitud</th>
                    <th>ID cliente</th>
                    <th>ID lote</th>
                    <th>Estatus de Anélisis</th>
                    <th>Fecha de emisión</th>
                    <th >Urgencia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 include("../include/conexion.php");
                 $con = OpenCon();
                if (mysqli_connect_errno()) {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $sql="Select * from solicitud_analisis where estatus='en proceso' ORDER BY urgencia DESC;";
                $result= mysqli_query($con,$sql);
                $activar=null;
                while($row = mysqli_fetch_array($result)) {
                   $estado=$row['estatus'];
                   if($row['urgencia']=="1"){
                       $activar="act";
                       $urgencia="Urgente";
                   }
                   else{
                    $urgencia="-";
                    $activar="act";
                   }
                   if($estado=="en proceso"){
                        $input="<input type='radio' class='form-check-input' name='seleccion' value=".$row['ID_solicitud']." required>";
                       echo "<tr class='alert alert-danger'><td>".$row['ID_solicitud']."</td><td>".$row['ID_cliente']."</td><td>".$row['ID_lote']."</td><td>".$row['estatus']."</td><td>".$row['f_emision']."</td><td>".$urgencia."</td><td style='text-align: right;'>".$input."</td></tr>";
                   }
                }
                ?>
            </tbody>
        </table>
        <input type="submit" name="submit" class="btn btn-dark" value="Realizar análisis" style="text-align:center"<?php if($activar==null){echo "disabled";}?> >
        </form>
    </div>
    </body>
</html>
