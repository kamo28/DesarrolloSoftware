<?php
    require "../header.php"
?>
    <head>
        <title>Alta/Baja de Cliente</title>
    </head>
    <!-- <body> -->
        <?php
            // Crear una conexión
            include '../conexion.php';
            $con = OpenCon();

            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
        ?>

        <!-- Button group -->
        <div class="container">
            <div class='wrapper text-center'>
                <div class="btn-group btn-group-lg">
                    <a class="btn btn-primary btn-lg active"  aria-pressed="true" href="/DesarrolloSoftware/Clientes/Cliente.php" role="button">Alta/Baja de clientes</a>
                    <a class="btn btn-primary" href="/DesarrolloSoftware/Clientes/Modificar.php" role="button">Cambio de datos de clientes</a>
                </div>
            </div>
        </div>

        <div class="container">
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

                <?php
                    $query01 = "SELECT Nombre_factor,Limite_inf,Limite_sup FROM parametros_lab WHERE Clave_factor_analisis = 1";
                        $result_res01=mysqli_query($con,$query01);  
                            while ($row01 = mysqli_fetch_array($result_res01)) { $Abs = $row01[0]; $liminf1 = $row01[1]; $limsup1 = $row01[2]; }
                    $query02 = "SELECT Nombre_factor,Limite_inf,Limite_sup FROM parametros_lab WHERE Clave_factor_analisis = 2";
                        $result_res02=mysqli_query($con,$query02);  
                            while ($row02 = mysqli_fetch_array($result_res02)) { $Tiempo = $row02[0]; $liminf2 = $row02[1]; $limsup2 = $row02[2]; }
                    $query03 = "SELECT Nombre_factor,Limite_inf,Limite_sup FROM parametros_lab WHERE Clave_factor_analisis = 3";
                        $result_res03=mysqli_query($con,$query03);  
                            while ($row03 = mysqli_fetch_array($result_res03)) { $Estabilidad = $row03[0]; $liminf3 = $row03[1]; $limsup3 = $row03[2]; }
                    $query04 = "SELECT Nombre_factor,Limite_inf,Limite_sup FROM parametros_lab WHERE Clave_factor_analisis = 4";
                        $result_res04=mysqli_query($con,$query04);  
                            while ($row04 = mysqli_fetch_array($result_res04)) { $Aflojamiento = $row04[0]; $liminf4 = $row04[1]; $limsup4 = $row04[2]; }
                    $query05 = "SELECT Nombre_factor,Limite_inf,Limite_sup FROM parametros_lab WHERE Clave_factor_analisis = 5";
                        $result_res05=mysqli_query($con,$query05);  
                            while ($row05 = mysqli_fetch_array($result_res05)) { $Qua = $row05[0]; $liminf5 = $row05[1]; $limsup5 = $row05[2]; }
                    $query06 = "SELECT Nombre_factor,Limite_inf,Limite_sup FROM parametros_lab WHERE Clave_factor_analisis = 6";
                        $result_res06=mysqli_query($con,$query06);  
                            while ($row06 = mysqli_fetch_array($result_res06)) { $Tenacidad = $row06[0]; $liminf6 = $row06[1]; $limsup6 = $row06[2]; }
                    $query07 = "SELECT Nombre_factor,Limite_inf,Limite_sup FROM parametros_lab WHERE Clave_factor_analisis = 7";                    
                        $result_res07=mysqli_query($con,$query07);  
                            while ($row07 = mysqli_fetch_array($result_res07)) { $Extensibilidad = $row07[0]; $liminf7 = $row07[1]; $limsup7 = $row07[2]; }
                    $query08 = "SELECT Nombre_factor,Limite_inf,Limite_sup FROM parametros_lab WHERE Clave_factor_analisis = 8";
                        $result_res08=mysqli_query($con,$query08);  
                            while ($row08 = mysqli_fetch_array($result_res08)) { $Energia = $row08[0]; $liminf8 = $row08[1]; $limsup8 = $row08[2]; }
                    $query09 = "SELECT Nombre_factor,Limite_inf,Limite_sup FROM parametros_lab WHERE Clave_factor_analisis = 9";                    
                        $result_res09=mysqli_query($con,$query09);  
                            while ($row09 = mysqli_fetch_array($result_res09)) { $Relacion = $row09[0]; $liminf9 = $row09[1]; $limsup9 = $row09[2]; }
                    $query10 = "SELECT Nombre_factor,Limite_inf,Limite_sup FROM parametros_lab WHERE Clave_factor_analisis = 10";
                        $result_res10=mysqli_query($con,$query10);  
                            while ($row10 = mysqli_fetch_array($result_res10)) { $Indice = $row10[0]; $liminf10 = $row10[1]; $limsup10 = $row10[2]; }


                ?>

            <div class="row">
                <div class="col-6">
                    <h4 class="text-center">Farinografo parámetros</h4>
                    <div class="row text-center">
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Absorcion" id="" value="<?php echo $Abs ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf1" id="" value="<?php echo $liminf1 ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup1" id="" value="<?php echo $limsup1 ?>" required>                               
                        </div>        
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Tiempo" id="" value="<?php echo $Tiempo ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf2" id="" value="<?php echo $liminf2 ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup2" id="" value="<?php echo $limsup2 ?>" required>                               
                        </div>  
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Estabilidad" id="" value="<?php echo $Estabilidad ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf3" id="" value="<?php echo $liminf3 ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup3" id="" value="<?php echo $limsup3 ?>" required>                               
                        </div>  
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Aflojamiento" id="" value="<?php echo $Aflojamiento ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf4" id="" value="<?php echo $liminf4 ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup4" id="" value="<?php echo $limsup4 ?>" required>                                
                        </div>  
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Quality" id="" value="<?php echo $Qua ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf5" id="" value="<?php echo $liminf5 ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup5" id="" value="<?php echo $limsup5 ?>">                               
                        </div>                                                                                                                                          
                    </div>
                </div>
                
                <div class="col-6">
                    <h4 class="text-center">Alveografo parámetros</h4>
                    <div class="row text-center">
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Tenacidad" id="" value="<?php echo $Tenacidad ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf6" id="" value="<?php echo $liminf6 ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup6" id="" value="<?php echo $limsup6 ?>" required>                               
                        </div>        
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Extensibilidad" id="" value="<?php echo $Extensibilidad ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf7" id="" value="<?php echo $liminf7 ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup7" id="" value="<?php echo $limsup7 ?>" required>                               
                        </div>  
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Energia" id="" value="<?php echo $Energia ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf8" id="" value="<?php echo $liminf8 ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup8" id="" value="<?php echo $limsup8 ?>" required>                               
                        </div>  
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Relacion" id="" value="<?php echo $Relacion ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf9" id="" value="<?php echo $liminf9 ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup9" id="" value="<?php echo $limsup9 ?>" required>                                
                        </div>  
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Indice" id="" value="<?php echo $Indice ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf10" id="" value="<?php echo $liminf10 ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup10" id="" value="<?php echo $limsup10 ?>">                               
                        </div>                                                                                                                                          
                    </div>                    
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

                    $liminf_1 = $_POST["liminf1"];$liminf_2 = $_POST["liminf2"];$liminf_3 = $_POST["liminf3"];$liminf_4 = $_POST["liminf4"];$liminf_5 = $_POST["liminf5"];$liminf_6 = $_POST["liminf6"];$liminf_7 = $_POST["liminf7"];$liminf_8 = $_POST["liminf8"];$liminf_9 = $_POST["liminf9"];$liminf_10 = $_POST["liminf10"]; 
                    $limsup_1 = $_POST["limsup1"];$limsup_2 = $_POST["limsup2"];$limsup_3 = $_POST["limsup3"];$limsup_4 = $_POST["limsup4"];$limsup_5 = $_POST["limsup5"];$limsup_6 = $_POST["limsup6"];$limsup_7 = $_POST["limsup7"];$limsup_8 = $_POST["limsup8"];$limsup_9 = $_POST["limsup9"];$limsup_10 = $_POST["limsup10"];


                    $query = "INSERT INTO clientes(Nombre_completo,RFC,Domicilio,Nombre_contacto,Clave_docesp,Estado) VALUES ('$nombre','$RFC','$Domicilio','$Contacto','$ClaveDoc','1')";  
                    $result_res0=mysqli_query($con,$query);

                    $query001 = "SELECT MAX(ID_cliente) FROM clientes";  
                    $result_res001=mysqli_query($con,$query001);

                    $roww = mysqli_fetch_array($result_res001);
                    $IDDD = $roww[0];

                    $query_1 = "INSERT INTO datos_analisis_cliente(ID_cliente,Clave_factor,Limite_inf,Limite_sup) VALUES ('$IDDD','1','$liminf_1','$limsup_1')";  
                            $result_res_1=mysqli_query($con,$query_1);
                    $query_2 = "INSERT INTO datos_analisis_cliente(ID_cliente,Clave_factor,Limite_inf,Limite_sup) VALUES ('$IDDD','2','$liminf_2','$limsup_2')";  
                            $result_res_2=mysqli_query($con,$query_2);
                    $query_3 = "INSERT INTO datos_analisis_cliente(ID_cliente,Clave_factor,Limite_inf,Limite_sup) VALUES ('$IDDD','3','$liminf_3','$limsup_3')";  
                            $result_res_3=mysqli_query($con,$query_3);
                    $query_4 = "INSERT INTO datos_analisis_cliente(ID_cliente,Clave_factor,Limite_inf,Limite_sup) VALUES ('$IDDD','4','$liminf_4','$limsup_4')";  
                            $result_res_4=mysqli_query($con,$query_4);
                    $query_5 = "INSERT INTO datos_analisis_cliente(ID_cliente,Clave_factor,Limite_inf,Limite_sup) VALUES ('$IDDD','5','$liminf_5','$limsup_5')";  
                            $result_res_5=mysqli_query($con,$query_5);
                    $query_6 = "INSERT INTO datos_analisis_cliente(ID_cliente,Clave_factor,Limite_inf,Limite_sup) VALUES ('$IDDD','6','$liminf_6','$limsup_6')";  
                            $result_res_6=mysqli_query($con,$query_6);
                    $query_7 = "INSERT INTO datos_analisis_cliente(ID_cliente,Clave_factor,Limite_inf,Limite_sup) VALUES ('$IDDD','7','$liminf_7','$limsup_7')";  
                            $result_res_7=mysqli_query($con,$query_7);
                    $query_8 = "INSERT INTO datos_analisis_cliente(ID_cliente,Clave_factor,Limite_inf,Limite_sup) VALUES ('$IDDD','8','$liminf_8','$limsup_8')";  
                            $result_res_8=mysqli_query($con,$query_8);
                    $query_9 = "INSERT INTO datos_analisis_cliente(ID_cliente,Clave_factor,Limite_inf,Limite_sup) VALUES ('$IDDD','9','$liminf_9','$limsup_9')";  
                            $result_res_9=mysqli_query($con,$query_9);
                    $query_10 = "INSERT INTO datos_analisis_cliente(ID_cliente,Clave_factor,Limite_inf,Limite_sup) VALUES ('$IDDD','10','$liminf_10','$limsup_10')";  
                            $result_res_10=mysqli_query($con,$query_10);
                }
            ?>
        </form>
        </div>


        
        <br><br><br><div class="container">
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
        </div>
        
        <div class="container">
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
        </div>
       
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
    </body>
</html>