<?php

    session_start();
    
    include("conex.php");

	$link=Conectarse();

	$query="select elect_nom from crearp_electiva";

    $id=$_SESSION['id'];
    $cuenta=$_SESSION['usu_tipo'];
    $name=$_SESSION['name'];
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
        <?php include ("menu_administrador.php") ?>
       <div align="center">
            <h3>Consultar Estudiante</h3> 
            <form method="post" action="">
                <div style="width: 60%;">   
                <table class="responsive-table" class="highlight">
                    <thead>
                        <tr>
                             <th>Nombre del Estudiante</th>
                            <th> <datalist id="lista"> 
                                
        <?php
		$result=mysqli_query($link,$query);
	
			while ($row=mysqli_fetch_array($result)){

				echo "<option value='".$row['elect_nom']."'></option>";
			}
	?>
	                        
                                </datalist></th>
                                <th><input class="form-control" type="text" name="buscar" list="lista" autocomplete="on" autofocus placeholder="Consultar Estudiante" required> </th>
                               <th>
                                <button type="submit" name="general" class="button button2" style="width:80%;"><i class="fa fa-search" style="font-size:15px"></i> Consultar</button> 
                        </th> 
                                
                                
                        </tr>
                    </thead>
                </table>
                </div>     
            </form>
        
        <center>
           
            <table class="centered" class="responsive-table" class="highlight">
       
             <thead>
                    <th><center>Materia</center></th>
					<th><center>Cod.Universitario</center></th>
                	<th><center>Estudiante</center></th>
                    <th><center>Apellidos</center></th>
            </thead>
        
<?php
      
        if(!empty($_POST['buscar'])){

            $buscar=limpiar($_POST['buscar']);

    $result=mysqli_query($link,"select * from crearp_electiva,crearp_usuarios,crearp_usuelectiva  where usu_coduniv=usuelectiva_usuarios and usuelectiva_electiva=elect_cod and elect_nom like '%$buscar%'");

                while($row=mysqli_fetch_array($result)){  
?>                
        
        <tr>
            <td><option><?php echo $row['elect_nom']; ?></option></td>  
            <td><option><?php echo $row['usu_coduniv']; ?></option></td>
            <td><option><?php echo $row['usu_nombres']; ?></option></td> 
            <td><option><?php echo $row['usu_apellidos']; ?></option></td> 
            
        </tr>
        
        <?php }} ?>
           </table>
           
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