<?php 
	session_start();
	
	include ("conex.php");
	
	$link=Conectarse();
?>

 <?php

	if(!empty($_POST['codigo']) and !empty($_POST['passw'])){

		$numero=limpiar($_POST['codigo']);
		
		$pass=limpiar($_POST['passw']);
	
		$result=mysqli_query($link,"select * from crearp_usuarios  where usu_coduniv='$numero'");
		
	
		if($row=mysqli_fetch_array($result)){

			if(password_verify($pass,$row['usu_contrasena'])){

					$_SESSION['id']=$row['usu_coduniv'];
					
					$_SESSION['name']=$row['usu_nombres'];
					
					$_SESSION['password']=$row['usu_contrasena'];
				
					$_SESSION['usu_tipo']=$row['usu_tipo'];
                
                    $_SESSION['name']=$row['usu_nombres'];
				
					
					if($_SESSION['usu_tipo']=='Administrador'){
					
						header("Location:registrar_electiva.php");
					
					}else{
                        
					   header("Location:usuario_electiva.php");
						
					}
			}else{
				
                
                $_SESSION["error1"]="Contraseña Incorrecta";
				
				header("Location:index.php");
				
			}
				

		}else{ 
		      
            $_SESSION["error2"]="Usuario Incorrecto";
			header("Location:index.php");
                
		}
		
		
	}

	
		
?>