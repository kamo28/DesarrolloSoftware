<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
      /* Stackoverflow preview fix, please ignore */
      .navbar-nav {
      flex-direction: row;
      }
      
      .nav-link {
      padding-right: .5rem !important;
      padding-left: .5rem !important;
      }
      
      /* Fixes dropdown menus placed on the right side */
      .ml-auto .dropdown-menu {
      left: auto !important;
      right: 0px;
      }
  </style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
      <!-- Brand -->
      <a class="navbar-brand" href="http://localhost:8888/DesarrolloSoftware/inicio.php">Molinos del Atlántico</a>
      <!-- <a class="navbar-brand" href="http://localhost:8888/DesarrolloSoftware/inicio.php">Molinos del Atlántico</a> -->

      <!-- Links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catálogos</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              if ($_SESSION['rol'] == "Admin") {
                echo '<a class="dropdown-item" href="/DesarrolloSoftware/Equipos/altaEquipo.php">Equipos de laboratorio</a>';
                echo '<a class="dropdown-item" href="/DesarrolloSoftware/Clientes/Cliente.php">Clientes</a>';
                echo '<a class="dropdown-item" href="/DesarrolloSoftware/Usuarios/altaUsuarios.php">Usuarios/Laboratoristas</a>';
              }elseif($_SESSION['rol'] == "Almacen"){
                echo '<a class="dropdown-item" href="/DesarrolloSoftware/Clientes/Cliente.php">Clientes</a>';
              }elseif($_SESSION['rol'] == "Lab"){
                echo '<a class="dropdown-item" href="/DesarrolloSoftware/Equipos/altaEquipo.php">Equipos de laboratorio</a>';
                echo '<a class="dropdown-item" href="/DesarrolloSoftware/Clientes/visualizarCliente.php">Clientes</a>';
              }
            ?>
          
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Operaciones</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              if ($_SESSION['rol'] == "Admin") {
                echo '<a class="dropdown-item" href="/DesarrolloSoftware/almacenista/estatus_ana.php">Solicitar/Checar análisis</a>';
                echo '<a class="dropdown-item" href="/DesarrolloSoftware/laboratorista/ana_solicitados.php">Realizar/Guardar análisis</a>';
              }elseif($_SESSION['rol'] == "Almacen"){
                echo '<a class="dropdown-item" href="/DesarrolloSoftware/almacenista/estatus_ana.php">Solicitar/Checar análisis</a>';
              }elseif($_SESSION['rol'] == "Lab"){
                echo '<a class="dropdown-item" href="/DesarrolloSoftware/laboratorista/ana_solicitados.php">Realizar/Guardar análisis</a>';
              }
            ?>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              if ($_SESSION['rol'] == "Admin" || $_SESSION['rol'] == "Almacen") {
                echo '<a class="dropdown-item" href="/DesarrolloSoftware/almacenista/certificados.php">Emisión de certificados</a>';
              }elseif($_SESSION['rol'] == "Lab"){
                echo "No cuenta con los permisos necesarios para acceder";
              }
            ?>
          </div>
        </li>

        <?php
          if(isset($_SESSION['usuario'])) {
            echo '<li class="nav-item">
                    <form role="form" action="http://localhost:8888/DesarrolloSoftware/include/logout.inc.php" method="post">
                      <center><button type="submit" class="btn btn-info" name="logout-submit">Logout</button></center>
                    </form>
                    
                  </li>';
                  // <form role="form" action="http://localhost:8888/DesarrolloSoftware/include/logout.inc.php" method="post">
                  //   <center><button type="submit" class="btn btn-info" name="logout-submit">Logout</button></center>
                  // </form>
          }
        ?>
      </ul>


    </nav>
    <br>
  </header>
