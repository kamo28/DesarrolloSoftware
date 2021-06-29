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
      <a class="navbar-brand" href="../inicio.php">Logo</a>

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
                echo '<a class="dropdown-item" href="/DesarrolloSoftware/cliente/Cliente.php">Clientes</a>';
              }elseif($_SESSION['rol'] == "Lab"){
                echo '<a class="dropdown-item" href="/DesarrolloSoftware/Equipos/altaEquipo.php">Equipos de laboratorio</a>';
              }
            ?>
          
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Operaciones</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              if ($_SESSION['rol'] == "Admin") {
                echo '<a class="dropdown-item" href="#">Análisis de datos de producción</a>';
              }elseif($_SESSION['rol'] == "Almacen"){
                echo 'Sin permisos necesarios para accesar';
              }elseif($_SESSION['rol'] == "Lab"){
                echo '<a class="dropdown-item" href="#">Análisis de datos de producción</a>';
              }
            ?>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              if ($_SESSION['rol'] == "Admin") {
                echo '<a class="dropdown-item" href="#">Emisión</a>
                      <a class="dropdown-item" href="#">Estadísticas</a>';
              }elseif($_SESSION['rol'] == "Almacen"){
                echo '<a class="dropdown-item" href="#">Emisión</a>';
              }elseif($_SESSION['rol'] == "Lab"){
                echo '<a class="dropdown-item" href="#">Estadísticas</a>';
              }
            ?>
          </div>
        </li>

        <?php
          if(isset($_SESSION['usuario'])) {
            echo '<li class="nav-item">
                    <form role="form" action="../logout.inc.php" method="post">
                      <center><button type="submit" class="btn btn-info" name="logout-submit">Logout</button></center>
                    </form>
                  </li>';
          }
        ?>
      </ul>


    </nav>
    <br>
  </header>