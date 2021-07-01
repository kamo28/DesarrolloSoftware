<?php
    require "../header.php"
?>
<head>
    <title>Visualizar Equipos</title>
</head>
    <!-- Button group -->
    <div class="container">
        <h2>Admin</h2>
        <div class="btn-group btn-group-lg">
            <a class="btn btn-primary" href="/DesarrolloSoftware/Equipos/altaEquipo.php" role="button">Alta de equipo de laboratorio</a>
            <a class="btn btn-primary" href="/DesarrolloSoftware/Equipos/modificarEquipo.php" role="button">Cambio de datos de equipo de laboratorio</a>
            <a class="btn btn-primary" href="/DesarrolloSoftware/Equipos/bajaEquipo.php" role="button">Cambiar estatus de equipo de laboratorio</a>
            <a class="btn btn-primary btn-lg active" aria-pressed="true" href="/DesarrolloSoftware/Equipos/visualizarEquipos.php" role="button">Visualizar Equipos de laboratorio</a>
        </div>
    </div>

    <?php
        //----------------------------------------------------  SQL  -----------------------------------------------------------
        // Crear una conexión
        include '../include/conexion.php';
        $con = OpenCon();
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql = "SELECT * FROM datosgen_lab";
        $res = mysqli_query($con,  $sql);

        echo "<br><br><div class='container'><div class='table-responsive'>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>Clave del equipo</th>
                            <th>Descripción larga del equipo</th>
                            <th>Descripción corta del equipo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Serie</th>
                            <th>Proveedor</th>
                            <th>Fecha de adquisición</th>
                            <th>Garantía</th>
                            <th>Ubicación</th>
                            <th>Responsable del equipo</th>
                            <th>Perido de mantenimiento en días</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>";
                    if (mysqli_num_rows($res) > 0) {
                        while ($equipos = mysqli_fetch_assoc($res)) {
                            echo "<tr>";
                            echo "<td>" . $equipos['Clave_equipo'] . "</td>";
                            echo "<td>" . $equipos['Descripcion_larga'] . "</td>";
                            echo "<td>" . $equipos['Descripcion_corta'] . "</td>";
                            echo "<td>" . $equipos['Marca'] . "</td>";
                            echo "<td>" . $equipos['Modelo'] . "</td>";
                            echo "<td>" . $equipos['Serie'] . "</td>";
                            echo "<td>" . $equipos['Proveedor'] . "</td>";
                            echo "<td>" . $equipos['Fecha_adquisicion'] . "</td>";
                            echo "<td>" . $equipos['Garantia'] . "</td>";
                            echo "<td>" . $equipos['Ubicacion'] . "</td>";
                            echo "<td>" . $equipos['Responsable_equipo'] . "</td>";
                            echo "<td>" . $equipos['Mantenimiento_equipo'] . "</td>";
                            if ($equipos['Estado'] == "1") {
                                echo "<td>" . "Activo" . "</td>";
                            }elseif($equipos['Estado'] == "2"){
                                echo "<td>" . "Inactivo" . "</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</tbody> </div>  </table> </div>";
                    }
    ?>
</body>
</html>