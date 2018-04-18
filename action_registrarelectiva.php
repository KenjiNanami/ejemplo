<?php  

    session_start();

    include("conex.php");

    $link=Conectarse();

    $nombre=$_POST['nombre'];
    $profesor=$_POST['profesor'];
    $desc=$_POST['desc'];
    $cupo=$_POST['cupo'];
    $aleatorio=mt_rand(1,95);
	$contador=mysqli_query($link,"select count(*) from crearp_electiva");


	if($row=mysqli_fetch_array($contador)){
				
		$add_valor=$row['count(*)']+$aleatorio;
		
		$elect_cod="ELECT".$add_valor;
	}
			
	mysqli_close($link);
		
	$link=Conectarse();	

    
   
    $registrarelectiva=mysqli_query($link,"insert into crearp_electiva values ('$elect_cod','$nombre','$profesor','$desc','$cupo')");

    if($registrarelectiva){
        
        $_SESSION["registro"]="Electiva guardada con exito";
    
        header("Location:registrar_electiva.php");
      
    }
    


?>