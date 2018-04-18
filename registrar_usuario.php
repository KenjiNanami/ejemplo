<?php 

    session_start();
    include ("conex.php"); 

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="utf-8">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/validar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    </head>
    <body>
        <div id="principal" align="center" class="row">
            <h3>Registrar</h3>
                <form method="post" action="action_registrarusu.php" onsubmit="return validar();">
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" name="nombre" id="nombre"  onkeypress="return soloLetras(event);">
                            <label for="nombre">Nombre</label>
                        </div>    
                        <div class="input-field col s6">
                             <input type="text" name="apellido" id="apellido" onkeypress="return soloLetras(event);" required>
                            <label for="apellido">Apellidos</label>

                        </div>
                        
                       <div class="input-field col s6">
                            <select name="tipo">
                                <option value="T.I" selected>Tarjeta de Identidad</option>
                                <option  value="C.C">Cedula de Ciudadania</option>
     
                            </select>
                            <label>Tipo de Documento</label>
                        </div>

                        <div class="input-field col s6">
                            <input type="text" name="documento" id="documento"  onKeyPress="return SoloNumeros(event);" required>
                            <label for="documento">Número de Documento</label>
                       </div> 
                        <div class="input-field col s6">
                              <input type="password" name="passw1" id="passw1" required>
                                <label for="passw1">Contraseña</label>
                       </div>
                        <div class="input-field col s6">
                             <input type="password" name="passw2" id="passw2"  required>
                             <label for="passw2">Verifique Contraseña</label>   
                        </div>
                 
                          
                             <button class="button button2" style="width:120px">Guardar</button>
                       
                        <?php
	
		                  if (isset($_SESSION["denegado"])) { 
			
	               ?>


                        <div class="alert alert-danger" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <center><?php echo $_SESSION["denegado"];?></center>
                        </div>

                    <?php 
                        unset($_SESSION["denegado"]);}
                    ?> 

                    
                      <?php

                        if (isset($_SESSION["contrasena"])) { 

                    ?>


                <div class="alert alert-danger" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <center><?php echo $_SESSION["contrasena"];?></center>
                </div>

                <?php 
                    unset($_SESSION["contrasena"]);}
                ?>    
    
                        
                        
                        
                        
                    </div>
               
            </form>    
        </div>
        
       
        
        
         <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
            
    <script>
    
         $(document).ready(function() {
            $('select').material_select();
        });
         
    </script>
            
            
    </body>
</html>