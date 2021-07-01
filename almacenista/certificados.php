<?php
    require "../include/header.php"
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar certificados</title>
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
    $con = OpenCon();

    // Check connection
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $error='<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>NÚMERO DE LOTE VACIO!</strong></div>';
    $inex='<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>NO HAY ANÁLISIS DEL LOTE, SOLICITA UN ANÁLISIS!</strong></div>';

    $enp='<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>ANALISIS EN PROCESO!</strong></div>';
    $action="htmlspecialchars($_SERVER[PHP_SELF])";
    $re=htmlspecialchars($_SERVER["PHP_SELF"]);
    $boton="";
    $dis="";
    $metodo="POST";
    $select="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["lote"])){
            echo $error;
        }  
        else{
            $sql="SELECT * FROM solicitud_analisis where estatus='finalizado' and ID_lote=".$_POST['lote']." and ID_cliente=".$_POST['cliente'].";";
            $result= mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            if($row==""){
                $sql2="SELECT * FROM solicitud_analisis where  ID_lote=".$_POST['lote']." and ID_cliente=".$_POST['cliente'].";";
                $result2= mysqli_query($con,$sql2);
                $row2 = mysqli_fetch_array($result2);
                if($row2['estatus']=="en proceso"){
                    echo $enp;
                }
                else{
                    echo $inex;
                }
            }
            else {
                $re="generar_c.php";
                $metodo="GET";
                $boton="<input type='submit' class='btn btn-dark' name='submit'value='Generar Certificado'>";
                $dis="disabled";
            }
        }
    }
    ?>
    
    <!-- Button group -->
    <div class="container">
        <div class='wrapper text-center'>
            <div class="btn-group btn-group-lg">
                <a class="btn btn-primary btn-lg active"  aria-pressed="true" href="certificados.php" role="button">Buscar resultados análisis</a>
            </div>
        </div>
    </div><br>

    <div class="container" style="width: 95%;">
        <form  method="<?php echo $metodo;?>" action="<?php echo $re;?>">
            <div class="form-group">
            <label for="lote"><h4>ID Cliente:</h4></label>
            <?php 
            if(isset($_POST['lote'])&&isset($_POST['cliente'])){
                $lote= $_POST['lote'];
                $cliente= $_POST['cliente'];
            }
            ?>
                <select name="cliente" class="form-control">
                    <option value="0">-Selecciona el id cliente-</option>
                    <?php
                    $result = mysqli_query($con,"SELECT * FROM clientes;");
                    while($row = mysqli_fetch_array($result)) {
                        if($row['ID_cliente']==$cliente){
                            echo "<option selected value=".$row['ID_cliente'].">".$row['ID_cliente']."---".$row['Nombre_completo']."</option>";
                        }
                        else{
                            echo "<option value=".$row['ID_cliente'].">".$row['ID_cliente']."---".$row['Nombre_completo']."</option>";
                        }
                        
                      }
                    ?>
                </select>
<?php
    echo $select;
?>
                <label for="lote"><h4>Número de Lote:</h4></label>
                <select name="lote" class="form-control">
                    <option value="0">-Selecciona el lote-</option>
                    <?php
                    $result = mysqli_query($con,"SELECT * FROM solicitud_analisis;");
                    while($row = mysqli_fetch_array($result)) {
                        if($row['ID_lote']==$lote){
                            echo "<option selected value=".$row['ID_lote'].">".$row['ID_lote']."</option>";
                        }
                        else{
                            echo "<option value=".$row['ID_lote'].">".$row['ID_lote']."</option>";
                        }
                      }
                    ?>
                </select>
            </div>
            <input type="submit" class="btn btn-dark" name="submit"value="Buscar Lote" <?php echo $dis?>>
            <?php echo $boton;
            ?>
        </form>
    </div>
    </body>
</html>