<?php

    session_start();
    
    include("conex.php");

	$link=Conectarse();

	

    $id=$_SESSION['id'];
    $cuenta=$_SESSION['usu_tipo'];
    $name=$_SESSION['name'];

   
   
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/validar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
       <style>
	
	.negro {
  		background-color: #2E2E2E!important;
		height: 65px;
		
	}

	.negro-text {
  		color: #2E2E2E !important;
	}
	
	.logo{
		margin: auto;
		margin-left: 50px;	
		width: auto;
		width: 1200px;
	}
		
		nav ul li a:hover{
			
			color:red;
			
		}	
		
		
		.cebra:nth-child(even){
			
			
			background-color: #F2F2F2;
		}	
		
		
	#ubicacionmenu{
			
			
		position: absolute;
		top:20px;
		left:1250px;
			
}		
	   
	   #instructor{
		   
		   	
		position: absolute;
		top:100px;
		left:200px;
		   
	   }
			
	
	</style>
      
    </head>
    <body>
        <?php include ("menu_administrador.php") ?>
        <div  align="center" class="row">
            <h3>Registrar Electiva</h3>
            <form method="post" action="action_registrarelectiva.php" onsubmit="return validar();" class="col s12">
                 <div class="row">  
                     <div class="input-field col s6">
                         <input type="text" name="nombre" id="nombre" required>
                         <label for="nombre">Nombre</label>
                     </div>
                     <div class="input-field col s6">
                        <input type="text" name="profesor" id="profesor" onkeypress="return soloLetras(event);" required>
                         <label for="profesor">Profesor</label>
                     </div>
                     <div class="input-field col s6">
                        
                        <input type="text" name="desc" id="desc" required>
                        <label for="desc">Descripción</label>
                     </div>
                     <div class="input-field col s6">
                        
                        <input type="number" name="cupo" id="cupo"  onKeyPress="return SoloNumeros(event);" required>
                         <label for="cupo">Número de cupos</label>
                     </div>
                     
                             <button class="button button2" style="width:120px">Guardar</button>
                    
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
          
                </div>
            </form>    
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
        
        	<script>
	
		 $(document).ready(function() {
    		 $(".btnmenu").sideNav();
  		});
          
	</script>
		
    </body>
</html>