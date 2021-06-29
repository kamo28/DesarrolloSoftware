<?php
    require "../header.php"
?>
<head>
    <title>Visualizar Clientes</title>
</head>
    <!-- Button group -->
    <div class="container">
        <div class='wrapper text-center'>
            <div class="btn-group btn-group-lg">
                <a class="btn btn-primary" href="/DesarrolloSoftware/Clientes/Cliente.php" role="button">Alta/Baja de clientes</a>
                <a class="btn btn-primary" href="/DesarrolloSoftware/Clientes/Modificar.php" role="button">Cambio de datos de clientes</a>
                <a class="btn btn-primary btn-lg active"  aria-pressed="true" href="/DesarrolloSoftware/Clientes/visualizarClientes.php" role="button">Visualizar clientes</a>
            </div>
        </div>
    </div>

    <?php
    //----------------------------------------------------  SQL  -----------------------------------------------------------
    // Crear una conexión
    include '../conexion.php';
    $con = OpenCon();
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "SELECT * FROM clientes";
    $res = mysqli_query($con,  $sql);

    echo "<br><br><div class='container'><div class='table-responsive'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID de cliente</th>
                        <th>Nombre completo</th>
                        <th>RFC</th>
                        <th>Domicilio</th>
                        <th>Nombre de contacto</th>
                        <th>Clave de documento</th>
                        <th>Estado</th>
                    </tr>
                </thead>

                <tbody>";
                if (mysqli_num_rows($res) > 0) {
                    while ($equipos = mysqli_fetch_assoc($res)) {
                        echo "<tr>";
                        echo "<td>" . $equipos['ID_cliente'] . "</td>";
                        echo "<td>" . $equipos['Nombre_completo'] . "</td>";
                        echo "<td>" . $equipos['RFC'] . "</td>";
                        echo "<td>" . $equipos['Domicilio'] . "</td>";
                        echo "<td>" . $equipos['Nombre_contacto'] . "</td>";
                        echo "<td>" . $equipos['Clave_docesp'] . "</td>";
                        if($equipos['Estado'] == 1){
                            echo "<td>Activo</td>";
                        }elseif($equipos['Estado'] == 2){
                            echo "<td>Inactivo</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</tbody> </div>  </table> </div>";
                }
    ?>