<!doctype html>
<html lang="en">
    <head>
        <title>Cliente</title>

        
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="Estilo.css">
    </head>
    <body>
        <?php
            $user ="root";
            $password="root";
            $host="localhost";
            $port="3307";
            $db="harina";
            $link = mysqli_init();
//            $conn = mysqli_real_connect($link,$host,$user,$password,$db,$port);
$con = mysqli_connect("localhost","root","","harina");

            if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            
            // $con=mysqli_connect($host,$user,$password,$db,$port);

        ?>

        <h1>Alta Cliente</h1>
        <form action="" method="post" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-12">
                    <label for="Nombre" class="form-label">Nombre Completo</label><br>
                    <input type="text" name="Nombre" class="form-control" required>
                </div>
                <div class="col-6">
                    <label for="RFC" class="form-label">RFC</label><br>
                    <input type="text" name="RFC" class="form-control" required>
                </div>
                <div class="col-6">
                    <label for="Domicilio" class="form-label">Domicilio</label><br>
                    <input type="text" name="Domicilio" class="form-control" required>
                </div>
                <div class="col-8">
                    <label for="Contacto" class="form-label">Nombre de Contacto</label><br>
                    <input type="text" name="Contacto" class="form-control" required>
                </div>
                <div class="col-4">
                    <label for="Clave de Documento" class="form-label">Clave de documento</label><br>
                    <input type="text" name="ClaveDoc" class="form-control" required>
                </div>
            </div>
            <h2>Datos de analisis solicitados</h2>
            <div class="row">
                <div class="col-12">
                    <label for="Facto de analisis solicitado" class="form-label">Factor de analisis solicitado</label><br>
                    <input type="number" name="Factor" class="form-control" required>
                </div>
                <div class="col-6">
                    <label for="Limite superior aceptable" class="form-label">Limite superior aceptable</label><br>
                    <input type="number" name="LimSup" class="form-control" required>
                </div>
                <div class="col-6">
                    <label for="Limite inferior aceptable" class="form-label">Limite inferior aceptable</label><br>
                    <input type="number" name="LimInf" class="form-control" required>
                </div>
            </div>

            <br>
            <button class="btn btn-primary" type="submit" name="submit">Enviar</button>
            <?php 
                if (isset($_POST['submit'])) {
                    $nombre = $_POST["Nombre"];
                    $RFC = $_POST["RFC"];
                    $Domicilio = $_POST["Domicilio"];
                    $Contacto = $_POST["Contacto"];
                    $ClaveDoc = $_POST["ClaveDoc"];
                    $Factor = $_POST["Factor"];
                    $LimSup = $_POST["LimSup"];
                    $LimInf = $_POST["LimInf"];

                    $query = "INSERT INTO clientes(Nombre_completo,RFC,Domicilio,Nombre_contacto,Clave_docesp,Estado) VALUES ('$nombre','$RFC','$Domicilio','$Contacto','$ClaveDoc','1')";  
                    $result_res0=mysqli_query($con,$query);

                    $query001 = "SELECT MAX(ID_cliente) FROM clientes";  
                    $result_res001=mysqli_query($con,$query001);

                    $roww = mysqli_fetch_array($result_res001);
                    $IDDD = $roww[0];

                    $query01 = "INSERT INTO datos_analisis_cliente(ID_cliente,Clave_factor,Limite_inf,Limite_sup) VALUES ('$IDDD','$Factor','$LimInf','$LimSup')";  
                    $result_res01=mysqli_query($con,$query01);
                }
            ?>
        </form>

        <form action="" method="post">
            <h1>Baja de cliente</h1>
            <div class="row">
                <div class="col-3">
                    <label for="" class="form-label">ID</label> <br>
                    <input type="number" name="ID" id="" class="form-control" required>
                </div>
                <div class="col-3">
                    <br>
                    <button class="btn btn-primary mt-2" type="submit" >Enviar</button>
                </div>
                <div class="col-6"></div>
            </div>
            <?php 
                $ID = $_POST["ID"];
                $query1 = "SELECT nombre_completo,RFC,Domicilio,Nombre_contacto FROM clientes WHERE ID_cliente = '$ID'";
                $result_res1=mysqli_query($con,$query1);        
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>RFC</th>
                        <th>Domicilio</th>
                        <th>Contacto</th>
                        </tr>
                </thead>
              <tbody>
              <?php
              while ($row = mysqli_fetch_array($result_res1)) {
              ?>
                <tr>
                  <td><?php echo $row[0]; ?></td>
                  <td><?php echo $row[1]; ?></td>
                  <td><?php echo $row[2]; ?></td>
                  <td><?php echo $row[3]; ?></td>            
                </tr>
              <?php
                } 
              ?>
              </tbody>
            </table>
        </form>

        <form action="" method="post" class="needs-validation" novalidate>

            <div class="row">
                <div class="col-3">
                    <label for="" class="form-label">Dar de baja</label> <br>
                    <input type="checkbox" value="0" id="" class="form-control" name="Estado" required>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary mt-4" type="submit" >Dar de baja</button>
                </div>
                <div class="col-6"></div>
            </div>

            <?php
              $Estado = $_POST["Estado"];
              $query2 = "UPDATE clientes set Estado='0' WHERE ID_cliente = '$ID'";
              $result_res1=mysqli_query($con,$query2);  
            ?>
        </form>
        <h1>Cambio de datos de Cliente</h1>

        <form action="" method="post" class="needs-validation" novalidate>

        <label for="" class="form-label">ID</label> <br>
            <input type="number" name="ID2" id="" class="form-control" required>
            
            <button class="btn btn-primary" type="submit" >Enviar</button>
            <?php
                $ID2 = $_POST["ID2"];
                $query3 = "SELECT * FROM datos_analisis_cliente WHERE ID_cliente = '$ID2'";
                $result_res3=mysqli_query($con,$query3);  

                while ($row3 = mysqli_fetch_array($result_res3)) {

                
            ?> 
                <br>
        </form>

        <form action="" method="post" class="needs-validation" novalidate>
              <label for="">ID</label>
              <input type="text" class="form-control" name="id" id="" value="<?php echo $row3[0] ?>" readonly>      
              <label for="">Clave Factor</label>
              <input type="text" class="form-control" name="Clav" id="" value="<?php echo $row3[1] ?>" required>      
              <label for="">Limite Inferior</label>
              <input type="text" class="form-control" name="LimI" id="" value="<?php echo $row3[2] ?>" required>      
              <label for="">Limite Superior</label>
              <input type="text" class="form-control" name="LimS" id="" value="<?php echo $row3[3] ?>" required>      
              <button class="btn btn-primary" type="submit" >Enviar</button>
              <?php } ?>

              <?php

              $id = $_POST["id"];
              $Clav = $_POST["Clav"];
              $LimS = $_POST["LimS"];
              $LimI = $_POST["LimI"];

              $query4 = "UPDATE datos_analisis_cliente set Clave_factor='$Clav',Limite_inf='$LimI',Limite_sup='$LimS' WHERE ID_cliente = '$id' ";
              $result_res4=mysqli_query($con,$query4); 

              
              ?>


      </form>

        <!-- Optional JavaScript -->
        <script>
          (function () {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
              .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                  if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                  }

                  form.classList.add('was-validated')
                }, false)
              })
          })()

        </script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>