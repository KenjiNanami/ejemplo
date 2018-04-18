	<?php   

	session_start();
    include ("conex.php"); 
   
    
    
    $modal = false;

    if (!empty($_GET['modal'])) {

        if ($_GET['modal'] == 1) {
            $modal = true;
        }
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Prueba Crearp</title>

  <!-- CSS  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --> 
   <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/validar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	
</head>
<body>
	
	
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2"></h1>
        <div class="row center">
            <div id="img">
				
            </div>
        </div>
        <div class="row center">
         <a href="#modalLogin"  title="Login"  class="button button1 modal-trigger">Iniciar Sesión</a>

            
         <!-- Modal Login -->
		<div class="modal" id="modalLogin" role="dialog">

		<form name="form53" method="post" action="action_index.php">
            <!-- Modal content-->

      					<div class="modal-content">

									   <table class="center">
									
									       <tr>
										      <div class="row">
                                                        <div id="input" class="input-field col s6">
                                                            <input id="codigo" type="text" name="codigo" class="validate" required>
                                                            <label for="codigo">Código</label>
                                                        </div>

                                                       <div id="input" class="input-field col s6">
                                                            <input id="passw" type="password" name="passw" class="validate" required>
                                                            <label for="passw">Contraseña</label>
                                                        </div>
                                                  
                                               </div>
									
									       </tr>
										   
										   
										   <tr>
										   	
											   <div class="row">
											   		<button class="button button1 modal-close modal-action">Cerrar</button>
                            						<button class="button button2">Entrar</button>
											   </div>
										   
										   </tr>
										   
									
									       <tr>
										      <div class="row">
										          <?php
                                                  
                                                    if (isset($_GET['error'])) {
                                                        
                                                        if ($_GET['error'] == 1) {
                                                            
                                                            echo '<div class="alert alert-danger alert-dismissible" id="myAlert" style="z-index:10000;width:400px;height:50px;">
                                                                <a href="#" class="close">&times;</a>
                                                               <center> Contraseña Errada </center>
                                                            </div>';
                                                            
                                                        } else if ($_GET['error'] == 2) {
                                                            echo '<div class="alert alert-danger alert-dismissible" id="myAlert" style="z-index:10000;width:400px;height:50px;">
                                                                <a href="#" class="close">&times;</a>
                                                              <center> Codigo Errado </center>
                                                            </div>';
                                                        }
                                                    }
                                                  ?>
                                               </div>
										      
									
									       </tr>
										   
										   
										   
										   
									
									</table>
							
      					</div>
      
  		</form>
	</div>   
            
            
    <!-- End Modal Login -->
            
            <a href="registrar_usuario.php"  title="Login" role="button" class="button button2">Registrarse</a>
          
            
             <?php
	
		if (isset($_SESSION["error1"])) { 
			
	?>


	<div class="alert alert-danger" role="alert">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<center><?php echo $_SESSION["error1"];?></center>
	</div>

	<?php 
		unset($_SESSION["error1"]);}
	?> 
	
	<?php
	
		if (isset($_SESSION["error2"])) { 
			
	?>


	<div class="alert alert-danger" role="alert">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<center><?php echo $_SESSION["error2"];?></center>
	</div>

	<?php 
		unset($_SESSION["error2"]);}
	?> 
    
            
        </div>
      </div>
    </div>
     
    <div><img src="img/fondo_index2.jpg" width="1500px" height="700px"  alt="Unsplashed background img 1"></div>
  </div>

	<?php
	
		if (isset($_SESSION["registro"])) { 
			
	?>


	<div class="alert alert-success" role="alert">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<center><?php echo $_SESSION["registro"];?></center>
	</div>

	<?php 
		unset($_SESSION["registro"]);}
	?> 
    
   
	

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><a href="#" class="button4" style="width:60%;"><i class="fa fa-book" style="font-size:30px"></i></a></h2> 
            <h5 class="center">Crear Electivas</h5>

            <p class="light"></p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"> <a href="#" class="button4" style="width:60%;"><i class="fa fa-refresh" style="font-size:30px"></i></a></h2>
            <h5 class="center">Actualizar Electivas</h5>

            <p class="light"></p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><a href="#" class="button4" style="width:60%;"><i class="fa fa-eye" style="font-size:30px"></i></a></h2> 
            <h5 class="center">Visualizar Electivas</h5>
            <p class="light"></p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light"></h5>
        </div>
      </div>
    </div>
    <div ><img src="img/fondo1.jpg" width="1500px" height="700px" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>La Educación...</h4>
          <p class="center-align light">Es un acto de amor, por tanto, un acto de valor<br><i><b>Paulo Freíre</b></i></p>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light"></h5>
        </div>
      </div>
    </div>
    <div ><img src="img/fondo2.jpg" width="1500px" height="700px" alt="Unsplashed background img 3"></div>
  </div>

 

  <!--  Scripts-->
     <script type="text/javascript" src="materialize/js/materialize.js"></script>
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>   
  
 
    <?php if ($modal === true) : ?>
    <script>

    $(document).ready(function(){
     
            
        $("#modalLogin").modal("show");

    });
        
    </script>
    <?php endif; ?>
	
	
	<script>
		$(document).ready(function(){
     
            
        

    });
	</script>
	
	<script>
		
		  $(document).ready(function(){
			// the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
			$('.modal').modal();
		  });

	
	</script>	
	
	
  </body>
</html>
