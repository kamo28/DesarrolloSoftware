<?php
    require "../header.php"
?>
<head>
    <style>
        .error {color: #FF0000;}
    </style>

    <title>Alta Equipo</title>
</head>
    <?php
        // define variables and set to empty values
        $des_larga = $des_corta = $marca = $modelo = $serie = $proveedor = $fecha_ad = $garantia = $ubicacion = $responsable_eq = $mantenimiento = $estado = "";
        $des_largaErr = $des_cortaErr = $marcaErr = $modeloErr = $serieErr = $proveedorErr = $fecha_adErr = $garantiaErr = $ubicacionErr = $responsable_eqErr = $mantenimientoErr = $estadoErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            if (empty($_POST["larga"])) {
                $des_largaErr = "Descripción larga del equipo necesaria";
            }else {
                $des_larga = test_input($_POST["larga"]);
            }

            if (empty($_POST["corta"])) {
                $des_cortaErr = "Descripción corta del equipo necesaria";
            }else {
                $des_corta = test_input($_POST["corta"]);
            }

            if (empty($_POST["marca"])) {
                $marcaErr = "Marca del equipo necesaria";
            }else {
                $marca = test_input($_POST["marca"]);
            }

            if (empty($_POST["modelo"])) {
                $modeloErr = "Modelo del equipo necesaria";
            }else {
                $modelo = test_input($_POST["modelo"]);
            }

            if (empty($_POST["serie"])) {
                $serieErr = "Serie del equipo necesaria";
            }else {
                $serie = test_input($_POST["serie"]);
            }

            if (empty($_POST["proveedor"])) {
                $proveedorErr = "Proveedor del equipo necesario";
            }else {
                $proveedor = test_input($_POST["proveedor"]);
            }

            if (empty($_POST["adquisicion"])) {
                $fecha_adErr = "Fecha de adquisición del equipo necesaria";
            }else {
                $fecha_ad = test_input($_POST["adquisicion"]);
            }

            if (empty($_POST["garantia"])) {
                $garantiaErr = "Garantía del equipo necesaria";
            }else {
                $garantia = test_input($_POST["garantia"]);
            }

            if (empty($_POST["ubicacion"])) {
                $ubicacionErr = "Ubicación del equipo necesaria";
            }else {
                $ubicacion = test_input($_POST["ubicacion"]);
            }

            if (empty($_POST["responsable"])) {
                $responsable_eqErr = "Responsable del equipo necesario";
            }else {
                $responsable_eq = test_input($_POST["responsable"]);
            }

            if (empty($_POST["mantenimiento"])) {
                $mantenimientoErr = "Periodo de mantenimiento del equipo necesario";
            }else {
                $mantenimiento = test_input($_POST["mantenimiento"]);
            }

            if (empty($_POST["estado"])) {
                $estadoErr = "Estado del equipo necesario";
            }else {
                $estado = test_input($_POST["estado"]);
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
            <a class="btn btn-primary btn-lg active"  aria-pressed="true" href="/DesarrolloSoftware/Equipos/altaEquipo.php" role="button">Alta de equipo de laboratorio</a>
            <a class="btn btn-primary" href="/DesarrolloSoftware/Equipos/modificarEquipo.php" role="button">Cambio de datos de equipo de laboratorio</a>
            <a class="btn btn-primary" href="/DesarrolloSoftware/Equipos/bajaEquipo.php" role="button">Cambiar estatus de equipo de laboratorio</a>
            <a class="btn btn-primary" href="/DesarrolloSoftware/Equipos/visualizarEquipos.php" role="button">Visualizar Equipos de laboratorio</a>
        </div>
    </div>

    <div class="container">
        <br><br>
        <p><span class="error">* campo requerido.</span></p>
        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Descripción larga:
            <div class="form-group">
                <input type="text" name="larga" class="form-control" value="<?php echo $des_larga;?>">
                <span class="error">* <?php echo $des_largaErr;?></span>
            </div>

            Descripción corta:
            <div class="form-group">
                <input type="text" name="corta" class="form-control" value="<?php echo $des_corta;?>">
                <span class="error">* <?php echo $des_cortaErr;?></span>
            </div>

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

            Proveedor:
            <div class="form-group">
                <input type="text" name="proveedor" class="form-control" value="<?php echo $proveedor;?>">
                <span class="error">* <?php echo $proveedorErr;?></span>
            </div>

            Fecha Adquisición:
            <div class="form-group">
                <input type="date" name="adquisicion" class="form-control" value="<?php echo $fecha_ad;?>">
                <span class="error">* <?php echo $fecha_adErr;?></span>
            </div>

            Garantía hasta:
            <div class="form-group">
                <input type="date" name="garantia" class="form-control" value="<?php echo $garantia;?>">
                <span class="error">* <?php echo $garantiaErr;?></span>
            </div>

            Ubicación:
            <div class="form-group">
                <input type="text" name="ubicacion" class="form-control" value="<?php echo $ubicacion;?>">
                <span class="error">* <?php echo $ubicacionErr;?></span>
            </div>

            Responsable del equipo:
            <div class="form-group">
                <input type="number" min="0" name="responsable" class="form-control" value="<?php echo $responsable_eq;?>">
                <span class="error">* <?php echo $responsable_eqErr;?></span>
            </div>

            Periodo de mantenimiento (en días):
            <div class="form-group">
                <input type="number" min="0" name="mantenimiento" class="form-control" value="<?php echo $mantenimiento;?>">
                <span class="error">* <?php echo $mantenimientoErr;?></span>
            </div>
            
            Estado: <span class="error">* <?php echo $estadoErr;?></span>
            <div class="form-group">
                <input type="radio" name="estado" <?php if (isset($estado) && $estado == "Activo") echo "checked";?> value=1>Activo<br>
                <input type="radio" name="estado" <?php if (isset($estado) && $estado == "Inactivo") echo "checked";?> value=2>Inactivo<br>
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>

    <?php
        if(isset($_POST['submit']) && !empty($_POST["larga"]) && !empty($_POST["corta"]) && !empty($_POST["marca"]) && !empty($_POST["modelo"]) && !empty($_POST["serie"]) && !empty($_POST["proveedor"]) && !empty($_POST["adquisicion"]) && !empty($_POST["garantia"]) && isset($_POST["ubicacion"]) && isset($_POST["responsable"]) && isset($_POST["mantenimiento"]) && isset($_POST["estado"])){
            // Crear una conexión
            include '../conexion.php';
            $con = OpenCon();

            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            // escape variables for security
            $des_larga = mysqli_real_escape_string($con, $_POST['larga']);
            $des_corta = mysqli_real_escape_string($con, $_POST['corta']);
            $marca = mysqli_real_escape_string($con, $_POST['marca']);
            $modelo = mysqli_real_escape_string($con, $_POST['modelo']);
            $serie = mysqli_real_escape_string($con, $_POST['serie']);
            $proveedor = mysqli_real_escape_string($con, $_POST['proveedor']);
            $fecha_ad = mysqli_real_escape_string($con, $_POST['adquisicion']);
            $garantia = mysqli_real_escape_string($con, $_POST['garantia']);
            $ubicacion = mysqli_real_escape_string($con, $_POST['ubicacion']);
            $responsable_eq = mysqli_real_escape_string($con, $_POST['responsable']);
            $mantenimiento = mysqli_real_escape_string($con, $_POST['mantenimiento']);
            $estado = mysqli_real_escape_string($con, $_POST['estado']);

            $result = mysqli_query($con,"SELECT Rol FROM usuarios WHERE ID_usuario = $responsable_eq;");

            while($row = mysqli_fetch_array($result)) {
                if ($row['Rol'] == "Admin" || $row['Rol'] == "Lab") {
                    //Insertar a DB
                    $sql = "INSERT INTO datosgen_lab (Descripcion_larga, Descripcion_corta, Marca, Modelo, Serie, Proveedor, Fecha_adquisicion, Garantia, Ubicacion, Responsable_equipo, Mantenimiento_equipo, Estado) VALUES ('$des_larga', '$des_corta', '$marca', '$modelo' , '$serie', '$proveedor', '$fecha_ad', '$garantia', '$ubicacion', '$responsable_eq', '$mantenimiento', '$estado');";
                    if (!mysqli_query($con,$sql)) {
                        die('<br>Error: ' . mysqli_error($con));
                    }
                    echo "<br>1 record added";
                    mysqli_close($con);
                    //////////////////////////////////////////////////////
                    echo "<script type='text/javascript'>window.top.location='/DesarrolloSoftware/Equipos/altaEquipo.php';</script>"; exit;
                }else{
                    echo '<br><br><div class="alert alert-warning alert-dismissable" ><button type="button" class="close" data-dismiss="alert"> &times;</button><strong>El responsable del equipo seleccionado no existe o no tiene los permisos necesarios</strong></div>';
                    //echo "<br>Error en la alta de datos del equipo: El responsable del equipo seleccionado no existe o no tiene los permisos necesarios";
                }
            }
        }
    ?>
</body>
</html>