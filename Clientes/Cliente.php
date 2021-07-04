<?php
    require "../header.php"
?>
    <head>
        <title>Alta/Baja de Cliente</title>
    </head>
    <!-- <body> -->
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
                    <a class="btn btn-primary btn-lg active"  aria-pressed="true" href="/DesarrolloSoftware/Clientes/Cliente.php" role="button">Alta/Baja de clientes</a>
                    <a class="btn btn-primary" href="/DesarrolloSoftware/Clientes/Modificar.php" role="button">Cambio de datos de clientes</a>
                    <a class="btn btn-primary" href="/DesarrolloSoftware/Clientes/visualizarClientes.php" role="button">Visualizar clientes</a>
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
                <?php
                    $query = "SELECT * FROM parametros_lab";
                        $result=mysqli_query($con,$query);  
                            $x=0;
                            while($row = mysqli_fetch_array($result)){
                                $NombreFactor[$x]=$row['Nombre_factor'];
                                $LimInf[$x]=$row['Limite_inf'];
                                $LimSup[$x]=$row['Limite_sup'];
                                $x++;
                            }
                ?>

            <fieldset class="question">
                <h3><label for="coupon_question">¿Quieres modificar los valores del analisis?</label></h3>
                <input class="coupon_question" type="checkbox" name="coupon_question" value="1" />
                <span class="item-text">SI/NO</span>
            </fieldset>


            <fieldset class="answer">
            <div class="row">
                <div class="col-6">
                    <h4 class="text-center">Farinografo parámetros</h4>
                    <div class="row text-center">
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Absorcion" id="" value="<?php echo $NombreFactor[0] ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf1" id="yourText" value="<?php echo $LimInf[0]?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup1" id="" value="<?php echo $LimSup[0] ?>" required>                               
                        </div>        
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Tiempo" id="" value="<?php echo $NombreFactor[1]?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf2" id="" value="<?php echo $LimInf[1] ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup2" id="" value="<?php echo $LimSup[1] ?>" required>                               
                        </div>  
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Estabilidad" id="" value="<?php echo $NombreFactor[2] ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf3" id="" value="<?php echo $LimInf[2] ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup3" id="" value="<?php echo $LimSup[2] ?>" required>                               
                        </div>  
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Aflojamiento" id="" value="<?php echo $NombreFactor[3] ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf4" id="" value="<?php echo $LimInf[3] ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup4" id="" value="<?php echo $LimSup[3] ?>" required>                                
                        </div>  
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Quality" id="" value="<?php echo $NombreFactor[4] ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf5" id="" value="<?php echo $LimInf[4] ?>" readonly required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup5" id="" value="<?php echo $LimSup[4] ?>" readonly >                               
                        </div>                                                                                                                                          
                    </div>
                </div>
                
                <div class="col-6">
                    <h4 class="text-center">Alveografo parámetros</h4>
                    <div class="row text-center">
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Tenacidad" id="" value="<?php echo $NombreFactor[5] ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf6" id="" value="<?php echo $LimInf[5] ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup6" id="" value="<?php echo $LimSup[5] ?>" required>                               
                        </div>        
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Extensibilidad" id="" value="<?php echo $NombreFactor[6] ?>" readonly>
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf7" id="" value="<?php echo $LimInf[6] ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup7" id="" value="<?php echo $LimSup[6] ?>" required>                               
                        </div>  
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Energia" id="" value="<?php echo $NombreFactor[7] ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf8" id="" value="<?php echo $LimInf[7] ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup8" id="" value="<?php echo $LimSup[7] ?>" required>                               
                        </div>  
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Relacion" id="" value="<?php echo $NombreFactor[8] ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf9" id="" value="<?php echo $LimInf[8] ?>" required readonly>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup9" id="" value="<?php echo $LimSup[8] ?>" required readonly>                                
                        </div>  
                        <div class="col-4">
                            <label for="">Factor</label><br>
                            <input type="text" name="Indice" id="" value="<?php echo $NombreFactor[9] ?>">
                        </div>
                        <div class="col-4">
                            <label for="">Limite inferior</label><br>
                            <input type="text" name="liminf10" id="" value="<?php echo $LimInf[9] ?>" required>                            
                        </div>
                        <div class="col-4">
                            <label for="">Limite superior</label><br>
                            <input type="text" name="limsup10" id="" value="<?php echo $LimSup[9] ?>">                               
                        </div>                                                                                                                                          
                    </div>                    
                </div>

            </div>
            </fieldset>

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


                    if(($liminf_6 && $liminf_7) == 0){
                        $ari1 = 0;
                       
                        $ari2 = $limsup_6 / $limsup_7;
                       
                    }else{
                        $ari1 = $liminf_6 / $liminf_7;
                        
                        $ari2 = $limsup_6 / $limsup_7;
                      
                    }



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
                    $query_9 = "INSERT INTO datos_analisis_cliente(ID_cliente,Clave_factor,Limite_inf,Limite_sup) VALUES ('$IDDD','9','$ari1','$ari2')";  
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

          $(".answer").hide();
            $(".coupon_question").click(function() {
                if($(this).is(":checked")) {
                    $(".answer").show();
                } else {
                    $(".answer").hide();
                }
            });

        </script>
    </body>
</html>
