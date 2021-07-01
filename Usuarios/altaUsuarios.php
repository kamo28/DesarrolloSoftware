<?php
    require "../include/header.php"
?>
<head>
    <style>
        .error {color: #FF0000;}
    </style>

    <title>Alta Usuarios</title>
</head>
<?php
        // define variables and set to empty values
        $usuario = $contraseña = $rol = "";
        $usuarioErr = $contraseñaErr = $rolErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            if (empty($_POST["usuario"])) {
                $usuarioErr = "Usuario necesario";
            }else {
                $usuario = test_input($_POST["usuario"]);
            }

            if (empty($_POST["contraseña"])) {
                $contraseñaErr = "Contraseña necesaria";
            }else {
                $contraseña = test_input($_POST["contraseña"]);
            }

            if (empty($_POST["rol"])) {
                $rolErr = "Rol del usuario necesario";
            }else {
                $rol = test_input($_POST["rol"]);
            }
        }

        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
?>

<!-- Button group --><br>
<div class="container">
    <div class='wrapper text-center'>
        <div class="btn-group btn-group-lg">
            <a class="btn btn-primary btn-lg active"  aria-pressed="true" href="/DesarrolloSoftware/Usuarios/altaUsuarios.php" role="button">Alta de usuarios/laboratoristas</a>
            <a class="btn btn-primary" href="/DesarrolloSoftware/Usuarios/visualizarUsuarios.php" role="button">Visualizar usuarios</a>
        </div>
    </div>
</div><br><br>

<div class="container">
    <h2>Usuarios</h2>
    <br><br>
    <p><span class="error">* campo requerido.</span></p>
    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Usuario:
        <div class="form-group">
            <input type="text" name="usuario" class="form-control" value="<?php echo $usuario;?>">
            <span class="error">* <?php echo $usuarioErr;?></span>
        </div>

        Contraseña:
        <div class="form-group">
            <input type="text" name="contraseña" class="form-control" value="<?php echo $contraseña;?>">
            <span class="error">* <?php echo $contraseñaErr;?></span>
        </div>

        Rol:
        <div class="form-group">
            <input type="text" name="rol" class="form-control" value="<?php echo $rol;?>">
            <span class="error">* <?php echo $rolErr;?></span>
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </form>
</div>

<?php
    if(isset($_POST['submit']) && !empty($_POST["usuario"]) && !empty($_POST["contraseña"]) && !empty($_POST["rol"])){
        // Crear una conexión
        include '../include/conexion.php';
        $con = OpenCon();

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        // escape variables for security
        $usuario = mysqli_real_escape_string($con, $_POST['usuario']);
        $contraseña = mysqli_real_escape_string($con, $_POST['contraseña']);
        $rol = mysqli_real_escape_string($con, $_POST['rol']);

        $sql = "INSERT INTO usuarios (Usuario, Contraseña, Rol) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }else{
            $hashedPwd = password_hash($contraseña, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sss", $usuario, $hashedPwd, $rol);
            mysqli_stmt_execute($stmt);
            echo "<script type='text/javascript'>window.top.location='/DesarrolloSoftware/Usuarios/altaUsuarios.php';</script>"; exit;
            mysqli_close($con);
        }
    }
?>
</body>
</html>