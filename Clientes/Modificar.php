<?php
    require "../header.php"
?>    
    <head>
        <title>Cambio datos cliente</title>
    </head>
        <?php
            // Crear una conexión
            include '../include/conexion.php';
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
                    <a class="btn btn-primary" href="/DesarrolloSoftware/Clientes/Cliente.php" role="button">Alta/Baja de clientes</a>
                    <a class="btn btn-primary btn-lg active"  aria-pressed="true" href="/DesarrolloSoftware/Clientes/Modificar.php" role="button">Cambio de datos de clientes</a>
                    <a class="btn btn-primary" href="/DesarrolloSoftware/Clientes/visualizarClientes.php" role="button">Visualizar clientes</a>
                </div>
            </div>
        </div>

        <div class="container">
        <h1>Cambio de datos de cliente</h1>
        <form action="" method="post" class="needs-validation" novalidate>

        <label for="" class="form-label">ID</label> <br>
            <input type="number" name="ID" id="" class="form-control" required>
            
            <button class="btn btn-primary" type="submit" >Enviar</button>
        </form>
        </div>

        <?php
                $ID = $_POST["ID"];

                $q = "SELECT p.Nombre_factor,d.Limite_inf,d.Limite_sup FROM datos_analisis_cliente d,parametros_lab p WHERE p.Clave_factor_analisis = d.Clave_factor AND ID_cliente = '$ID' AND Clave_factor = '1'";  
                $r=mysqli_query($con,$q);
                while ($row = mysqli_fetch_array($r)) { $Abs = $row[0]; $liminf1 = $row[1]; $limsup1 = $row[2]; }

                $q1 = "SELECT p.Nombre_factor,d.Limite_inf,d.Limite_sup FROM datos_analisis_cliente d,parametros_lab p WHERE p.Clave_factor_analisis = d.Clave_factor AND ID_cliente = '$ID' AND Clave_factor = '2'";  
                $r1=mysqli_query($con,$q1);
                while ($row1 = mysqli_fetch_array($r1)) { $Tiempo = $row1[0]; $liminf2 = $row1[1]; $limsup2 = $row1[2]; }

                $q2 = "SELECT p.Nombre_factor,d.Limite_inf,d.Limite_sup FROM datos_analisis_cliente d,parametros_lab p WHERE p.Clave_factor_analisis = d.Clave_factor AND ID_cliente = '$ID' AND Clave_factor = '3'";  
                $r2=mysqli_query($con,$q2);
                while ($row2 = mysqli_fetch_array($r2)) { $Estabilidad = $row2[0]; $liminf3 = $row2[1]; $limsup3 = $row2[2]; }

                $q3 = "SELECT p.Nombre_factor,d.Limite_inf,d.Limite_sup FROM datos_analisis_cliente d,parametros_lab p WHERE p.Clave_factor_analisis = d.Clave_factor AND ID_cliente = '$ID' AND Clave_factor = '4'";  
                $r3=mysqli_query($con,$q3);
                while ($row3 = mysqli_fetch_array($r3)) { $Aflojamiento = $row3[0]; $liminf4 = $row3[1]; $limsup4 = $row3[2]; }

                $q4 = "SELECT p.Nombre_factor,d.Limite_inf,d.Limite_sup FROM datos_analisis_cliente d,parametros_lab p WHERE p.Clave_factor_analisis = d.Clave_factor AND ID_cliente = '$ID' AND Clave_factor = '5'";  
                $r4=mysqli_query($con,$q4);
                while ($row4 = mysqli_fetch_array($r4)) { $Quality = $row4[0]; $liminf5 = $row4[1]; $limsup5 = $row4[2]; }

                $q5 = "SELECT p.Nombre_factor,d.Limite_inf,d.Limite_sup FROM datos_analisis_cliente d,parametros_lab p WHERE p.Clave_factor_analisis = d.Clave_factor AND ID_cliente = '$ID' AND Clave_factor = '6'";  
                $r5=mysqli_query($con,$q5);
                while ($row5 = mysqli_fetch_array($r5)) { $Tenacidad = $row5[0]; $liminf6 = $row5[1]; $limsup6 = $row5[2]; }

                $q6 = "SELECT p.Nombre_factor,d.Limite_inf,d.Limite_sup FROM datos_analisis_cliente d,parametros_lab p WHERE p.Clave_factor_analisis = d.Clave_factor AND ID_cliente = '$ID' AND Clave_factor = '7'";  
                $r6=mysqli_query($con,$q6);
                while ($row6 = mysqli_fetch_array($r6)) { $Extensibilidad = $row6[0]; $liminf7 = $row6[1]; $limsup7 = $row6[2]; }

                $q7 = "SELECT p.Nombre_factor,d.Limite_inf,d.Limite_sup FROM datos_analisis_cliente d,parametros_lab p WHERE p.Clave_factor_analisis = d.Clave_factor AND ID_cliente = '$ID' AND Clave_factor = '8'";  
                $r7=mysqli_query($con,$q7);
                while ($row7 = mysqli_fetch_array($r7)) { $Energia = $row7[0]; $liminf8 = $row7[1]; $limsup8 = $row7[2]; }

                $q8 = "SELECT p.Nombre_factor,d.Limite_inf,d.Limite_sup FROM datos_analisis_cliente d,parametros_lab p WHERE p.Clave_factor_analisis = d.Clave_factor AND ID_cliente = '$ID' AND Clave_factor = '9'";  
                $r8=mysqli_query($con,$q8);
                while ($row8 = mysqli_fetch_array($r8)) { $Relacion = $row8[0]; $liminf9 = $row8[1]; $limsup9 = $row8[2]; }

                $q9 = "SELECT p.Nombre_factor,d.Limite_inf,d.Limite_sup FROM datos_analisis_cliente d,parametros_lab p WHERE p.Clave_factor_analisis = d.Clave_factor AND ID_cliente = '$ID' AND Clave_factor = '10'";  
                $r9=mysqli_query($con,$q9);
                while ($row9 = mysqli_fetch_array($r9)) { $Indice = $row9[0]; $liminf10 = $row9[1]; $limsup10 = $row9[2]; }

                
        ?> 

        <br><br><div class="container">
        <form action="" method="post">
        <div class="row">
                <div class="col-6">
                    <h4 class="text-center">Farinografo parámetros</h4>
                    <div class="row text-center">
                    <div class="col-12">
                            <input type="text" name="IDD" id="" value="<?php echo $ID ?>" readonly hidden>
                        </div>
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
                            <input type="text" name="Estabilidad" id="" value="<?php echo $Estabilidad ?>" readonly>
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
                            <input type="text" name="Aflojamiento" id="" value="<?php echo $Aflojamiento ?>" readonly>
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
                            <input type="text" name="Quality" id="" value="<?php echo $Quality ?>" readonly>
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
                            <input type="text" name="Energia" id="" value="<?php echo $Energia ?>" readonly>
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
                            <input type="text" name="Relacion" id="" value="<?php echo $Relacion ?>" readonly>
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
                            <input type="text" name="Indice" id="" value="<?php echo $Indice ?>" readonly>
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

                <?php
                $liminf_1 = $_POST["liminf1"];$liminf_2 = $_POST["liminf2"];$liminf_3 = $_POST["liminf3"];$liminf_4 = $_POST["liminf4"];$liminf_5 = $_POST["liminf5"];$liminf_6 = $_POST["liminf6"];$liminf_7 = $_POST["liminf7"];$liminf_8 = $_POST["liminf8"];$liminf_9 = $_POST["liminf9"];$liminf_10 = $_POST["liminf10"]; 
                $limsup_1 = $_POST["limsup1"];$limsup_2 = $_POST["limsup2"];$limsup_3 = $_POST["limsup3"];$limsup_4 = $_POST["limsup4"];$limsup_5 = $_POST["limsup5"];$limsup_6 = $_POST["limsup6"];$limsup_7 = $_POST["limsup7"];$limsup_8 = $_POST["limsup8"];$limsup_9 = $_POST["limsup9"];$limsup_10 = $_POST["limsup10"];

                $IDD = $_POST["IDD"];

                $qu1 = "UPDATE datos_analisis_cliente set Limite_inf='$liminf_1',Limite_sup='$limsup_1' WHERE ID_cliente = '$IDD' AND Clave_factor = '1'";
                $re1 =mysqli_query($con,$qu1); 
                $qu2 = "UPDATE datos_analisis_cliente set Limite_inf='$liminf_2',Limite_sup='$limsup_2' WHERE ID_cliente = '$IDD' AND Clave_factor = '2'";
                $re2 =mysqli_query($con,$qu2); 
                $qu3 = "UPDATE datos_analisis_cliente set Limite_inf='$liminf_3',Limite_sup='$limsup_3' WHERE ID_cliente = '$IDD' AND Clave_factor = '3'";
                $re3 =mysqli_query($con,$qu3); 
                $qu4 = "UPDATE datos_analisis_cliente set Limite_inf='$liminf_4',Limite_sup='$limsup_4' WHERE ID_cliente = '$IDD' AND Clave_factor = '4'";
                $re4 =mysqli_query($con,$qu4); 
                $qu5 = "UPDATE datos_analisis_cliente set Limite_inf='$liminf_5',Limite_sup='$limsup_5' WHERE ID_cliente = '$IDD' AND Clave_factor = '5'";
                $re5 =mysqli_query($con,$qu5); 
                $qu6 = "UPDATE datos_analisis_cliente set Limite_inf='$liminf_6',Limite_sup='$limsup_6' WHERE ID_cliente = '$IDD' AND Clave_factor = '6'";
                $re6 =mysqli_query($con,$qu6); 
                $qu7 = "UPDATE datos_analisis_cliente set Limite_inf='$liminf_7',Limite_sup='$limsup_7' WHERE ID_cliente = '$IDD' AND Clave_factor = '7'";
                $re7 =mysqli_query($con,$qu7); 
                $qu8 = "UPDATE datos_analisis_cliente set Limite_inf='$liminf_8',Limite_sup='$limsup_8' WHERE ID_cliente = '$IDD' AND Clave_factor = '8'";
                $re8 =mysqli_query($con,$qu8); 
                $qu9 = "UPDATE datos_analisis_cliente set Limite_inf='$liminf_9',Limite_sup='$limsup_9' WHERE ID_cliente = '$IDD' AND Clave_factor = '9'";
                $re9 =mysqli_query($con,$qu9); 
                $qu10 = "UPDATE datos_analisis_cliente set Limite_inf='$liminf_10',Limite_sup='$limsup_10' WHERE ID_cliente = '$IDD' AND Clave_factor = '10'";
                $re10 =mysqli_query($con,$qu10); 

    
                    
                ?>
            </div>
            <button class="btn btn-primary" type="submit" >Enviar</button>            
        </form>
        </div>
      
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