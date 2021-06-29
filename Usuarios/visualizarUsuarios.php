<?php
    require "../header.php"
?>
<head>
    <title>Visualizar Usuarios</title>
</head>
    <!-- Button group --><br>
    <div class="container">
        <div class='wrapper text-center'>
            <div class="btn-group btn-group-lg">
                <a class="btn btn-primary" href="/DesarrolloSoftware/Usuarios/altaUsuarios.php" role="button">Alta de usuarios/laboratoristas</a>
                <a class="btn btn-primary btn-lg active"  aria-pressed="true" href="/DesarrolloSoftware/Usuarios/visualizarUsuarios.php" role="button">Visualizar usuarios</a>
            </div>
        </div>
    </div><br><br>

    <?php
    //----------------------------------------------------  SQL  -----------------------------------------------------------
    // Crear una conexión
    include '../conexion.php';
    $con = OpenCon();
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "SELECT * FROM usuarios";
    $res = mysqli_query($con,  $sql);

    echo "<br><br><div class='container'><div class='table-responsive'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Rol</th>
                    </tr>
                </thead>

                <tbody>";
                if (mysqli_num_rows($res) > 0) {
                    while ($equipos = mysqli_fetch_assoc($res)) {
                        echo "<tr>";
                        echo "<td>" . $equipos['Usuario'] . "</td>";
                        echo "<td>" . $equipos['Rol'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody> </div>  </table> </div>";
                }
    ?>