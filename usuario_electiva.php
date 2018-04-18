<?php

    session_start();
    
    include("conex.php");

	$link=Conectarse();

	$query="select elect_nom from crearp_electiva";

    $id=$_SESSION['id'];
    $cuenta=$_SESSION['usu_tipo'];
    $name=$_SESSION['name'];

    mysqli_close($link);
    $link=Conectarse();

   

    if(!empty($_POST['codigo'])&&!empty($_POST['nombre'])){
        
        $codigo=$_POST['codigo'];
        $nombre=$_POST['nombre'];
        
         $buscar_inscripcion=mysqli_query($link,"select * from crearp_usuelectiva where usuelectiva_usuarios='$id' and usuelectiva_electiva='$codigo'");
        
        mysqli_close($link);
        $link=Conectarse(); 
        
        if(mysqli_num_rows($buscar_inscripcion) == 0){
            
             $guardar_usuelect=mysqli_query($link,"insert into crearp_usuelectiva values ('$id','$codigo')");
        
            $_SESSION["registro"]="Usted se ha inscripto exitosamente a la electiva de $nombre";
            
            mysqli_close($link);
            $link=Conectarse();  
            
            $num_cupos=mysqli_query($link,"select elect_cupos from crearp_electiva where elect_cod='$codigo'");
		
			if($row=mysqli_fetch_array($num_cupos)){
				
                $res_cupos=$row['elect_cupos']-1;
                
                mysqli_close($link);
                $link=Conectarse();  
                
                $actualizar_cupos=mysqli_query($link,"update crearp_electiva set elect_cupos='$res_cupos' where elect_cod='$codigo'");
		
			}
		}else{
            
            $_SESSION["denegado"]="Ya se encontraba inscripto(a) en la electiva de $nombre";
            
        }   
    }   

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Consultar Electiva</title>
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
        <?php include ("menu_estudiante.php") ?>
       <div align="center">
            <h3>Consultar Electiva</h3> 
            <form method="post" action="">
                <div style="width: 60%;">   
                <table class="responsive-table" class="highlight">
                    <thead>
                        <tr>
                             <th>Nombre Electiva</th>
                            <th> <datalist id="lista"> 
                                
        <?php
		$result=mysqli_query($link,$query);
	
			while ($row=mysqli_fetch_array($result)){

				echo "<option value='".$row['elect_nom']."'></option>";
			}
	?>
	                        
                                </datalist></th>
                                <th><input class="form-control" type="text" name="buscar" list="lista" autocomplete="on" autofocus placeholder="Consultar Electiva" required> </th>
                               <th>
                                <button type="submit" name="general" class="button button2" style="width:80%;"><i class="fa fa-search" style="font-size:20px"></i> Consultar</button> 
                        </th> 
                                
                                
                        </tr>
                    </thead>
                </table>
                </div>     
            </form>
        
        <center>
           
            <table class="centered" class="responsive-table" class="highlight">
       
             <thead>
					<th><center>Codigo</center></th>
                	<th><center>Nombre</center></th>
					<th><center>Inscribirse</center></th>
            </thead>
        
<?php
      
        if(!empty($_POST['buscar'])){

            $buscar=limpiar($_POST['buscar']);

    $result=mysqli_query($link,"select * from crearp_electiva  where elect_nom like '%$buscar%' or elect_cod='$buscar'");

                while($row=mysqli_fetch_array($result)){  
?>                
        
        <tr>
            <td><option><?php echo $row['elect_cod']; ?></option></td>  
            <td><option><?php echo $row['elect_nom']; ?></option></td> 
            
            <td><a href="#x<?php echo $row['elect_cod'];?>"  title="Editar" role="button" class="button4 modal-trigger" style="width:60%;"><i class="fa fa-check-circle" style="font-size:20px"></i></a>
          
              
    	<!-- Modal ING X USER -->
		<div class="modal" id="x<?php echo $row['elect_cod']; ?>">

		  <form name="form53" method="post" action="">
                <div class="modal-content">
                    <table class="center">
                        <tr>
                            <td colspan="2">
                                
								<h3>Inscribirse a Electiva</h3>
                                
							</td>
										
				        </tr>
						<tr>
                            <th>
                                  <strong> Codigo </strong><br>
                                    <input type="text" name="codigo" value="<?php echo $row['elect_cod']; ?>" autocomplete="off" readonly><br>
                             </th>

										
                             <th>
                                  <strong> Nombre </strong><br>
                                  <input type="text" name="nombre" value="<?php echo $row['elect_nom']; ?>" autocomplete="off" readonly><br>
                             </th>
										
										
                        </tr>

                        <tr>
                             <th>
                                  <strong> Profesor </strong><br>
                                  <input type="text" name="profesor" value="<?php echo $row['elect_profesor']; ?>" autocomplete="off" readonly><br>
                              </th>
                                        
                            <th>
                                 <strong> Cupos </strong><br>
                                 <input type="text" name="cupo" value="<?php echo $row['elect_cupos']; ?>" autocomplete="off" readonly><br>
                             </th>
						</tr>
				        <tr>	

                            <td colspan="2">
                                <div class="input-field col s12">
								    <textarea  name="desc" id="desc" class="materialize-textarea" readonly><?php echo $row['elect_descripcion']?></textarea>
								    <label for="eje_desc">Descripción</label>
								</div>
                            </td>
									
                        </tr>
                        
                        <tr>
                            <td>
                                <button type="button" class="button button1 modal-close modal-action"  data-dismiss="modal" style="width:55%;"><i class="fa fa-remove" style="font-size:15px" ></i>   Cerrar</button>
                            </td>
                            <td>
                                <button type="submit" name="guardar" class="button button2" style="width:55%;"><strong><i class="fa fa-check-circle" style="font-size:15px"></i> Inscribirse</strong></button>
                            </td>
                        
                        </tr>

                    </table>
              </div>
        </form>
    </div>


                    <!-- End Modal Update Electiva-->
    
            </td>  
        </tr>
        
        <?php }} ?>
           </table>
            
             <?php 
	
		      if (isset($_SESSION["registro"])) { ?>
        
                <div class="alert alert-success" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <center><?php echo $_SESSION["registro"];?></center>
                </div>

                <?php 
                    unset($_SESSION["registro"]);}
                ?> 
            
            
             <?php 
	
		      if (isset($_SESSION["denegado"])) { ?>
        
                <div class="alert alert-success" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <center><?php echo $_SESSION["denegado"];?></center>
                </div>

                <?php 
                    unset($_SESSION["denegado"]);}
                ?> 
           
       </center>  
         </div>
    <script type="text/javascript" src="materialize/js/materialize.js"></script>
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>   
        
        <script>
        
            $(document).ready(function(){
    
                $('.modal').modal();
            });
        </script>
        
        	
		<script>
	
		 $(document).ready(function() {
    		 $(".btnmenu").sideNav();
  		});
          
	</script>
		
        
    </body>
</html>