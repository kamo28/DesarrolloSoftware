<?php
    require "../header.php"
?>
<head>
    <style>
        .error {color: #FF0000;}
    </style>

    <title>Baja Equipo</title>
</head>
    <?php
            // define variables and set to empty values
            $clave = $marca = $modelo = $serie = $estado = "";
            $claveErr = $marcaErr = $modeloErr = $serieErr = $estadoErr = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                if (empty($_POST["estado"])) {
                    $estadoErr = "Estado del equipo necesario";
                }else {
                    $estado = test_input($_POST["estado"]);
                }

                if (empty($_POST["clave"])) {
                    $claveErr = "Clave del equipo necesaria";
                }else {
                    $clave = test_input($_POST["clave"]);
                }
            }

            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }
    ?>

    <!-- Button group -->
    <div class="container">
        <h2>Admin</h2>
        <div class="btn-group btn-group-lg">
            <a class="btn btn-primary" href="/DesarrolloSoftware/Equipos/altaEquipo.php" role="button">Alta de equipo de laboratorio</a>
            <a class="btn btn-primary" href="/DesarrolloSoftware/Equipos/modificarEquipo.php" role="button">Cambio de datos de equipo de laboratorio</a>
            <a class="btn btn-primary btn-lg active" aria-pressed="true" href="/DesarrolloSoftware/Equipos/bajaEquipo.php" role="button">Cambiar estatus de equipo de laboratorio</a>
            <a class="btn btn-primary" href="/DesarrolloSoftware/Equipos/visualizarEquipos.php" role="button">Visualizar Equipos de laboratorio</a>

        </div>
    </div>

    <?php
        if(isset($_POST['buscar']) && !empty($_POST["clave"])){
            // Crear una conexión
            include '../include/conexion.php';
            $con = OpenCon();
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            // escape variables for security
            $clave = mysqli_real_escape_string($con, $_POST['clave']);

            $result = mysqli_query($con,"SELECT * FROM datosgen_lab WHERE Clave_equipo = $clave;");

            while($row = mysqli_fetch_array($result)) {
                $des_larga = $row['Descripcion_larga'];
                $marca = $row['Marca'];
                $modelo = $row['Modelo'];
                $serie = $row['Serie'];
                $estado = $row['Estado'];
            }

            if ($des_larga == "") {
                echo '<div class="alert alert-warning alert-dismissable" ><button type="button" class="close" data-dismiss="alert"> &times;</button><strong>No existe un equipo de laboratorio con esa clave</strong></div>';
            }

            mysqli_close($con);
        }    
    ?>

    <div class="container">
        <br><br>
        <h2>Ingrese clave del equipo de laboratorio a modificar:</h2>
        <p><span class="error">* campo requerido.</span></p>
        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Clave del equipo:
            <div class="form-group">
                <input type="number" min="1" name="clave" class="form-control" value="<?php echo $clave;?>">
                <span class="error">* <?php echo $claveErr;?></span>
            </div>
            <input type="submit" name="buscar" class="btn btn-primary" value="Buscar">
        

            <br><br><h2>Estado del equipo de laboratorio:</h2>
            Marca:
            <div class="form-group">
                <input type="text" name="marca" class="form-control" value="<?php echo $marca;?>">
                <span class="error">* <?php echo $marcaErr;?></span>
            </div>

            Modelo:
            <div class="form-group">
                <input type="text" name="modelo" class="form-control" value="<?php echo $modelo;?>">
                <span class="error">* <?php echo $modeloErr;?></span>
            </div>

            Serie:
            <div class="form-group">
                <input type="text" name="serie" class="form-control" value="<?php echo $serie;?>">
                <span class="error">* <?php echo $serieErr;?></span>
            </div>

            Estado: <span class="error">* <?php echo $estadoErr;?></span>
            <div class="form-group">
                <input type="radio" name="estado" <?php if (isset($estado) && $estado == "Activo") echo "checked";?> value=1>Activo<br>
                <input type="radio" name="estado" <?php if (isset($estado) && $estado == "Inactivo") echo "checked";?> value=2>Inactivo<br>
                <input type="radio" name="estado" <?php if (isset($estado) && $estado == "Baja") echo "checked";?> value=3>Dar de baja<br>
            </div>

            <input type="submit" name="cambiar" class="btn btn-primary" value="Guardar estado">
        </form>
    </div>

    <?php
        if(isset($_POST['cambiar']) && !empty($_POST["clave"]) && isset($_POST["estado"])){
            // Crear una conexión
            include '../include/conexion.php';
            $con = OpenCon();
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }else{
                echo "Connected to MySQL: ";
            }

            //Modificar a DB
            $sql = "UPDATE datosgen_lab SET Estado = '$estado' WHERE Clave_equipo = '$clave';";
            if (!mysqli_query($con,$sql)) {
                die('<br>Error: ' . mysqli_error($con));
            }
            echo "<br>1 record modified";
            


            //Baja de la db
            $sql = "DELETE FROM datosgen_lab WHERE Clave_equipo = '$clave' AND Estado = '3';";
            if (!mysqli_query($con,$sql)) {
                die('<br>Error: ' . mysqli_error($con));
            }
            echo "<br>1 record removed";


            //////////////////////////////////////////////////////
            mysqli_close($con);
            echo "<script type='text/javascript'>window.top.location='/DesarrolloSoftware/Equipos/bajaEquipo.php';</script>"; exit;
        }   
            
    ?>
</body>
</html>