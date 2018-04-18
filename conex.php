<?php
  
	function Conectarse(){
      		if (!($link= mysqli_Connect("localhost","root",""))){
		  	echo "Error con el servidor";
		  	exit();
	  	}
	  	
		if (!mysqli_select_db($link,"bd_crearp")){
		  echo "Error seleccionando la base de datos";
		  exit();
	  	}
		
		mysqli_set_charset($link, "utf8");
		return $link;
  	}
	
	function limpiar($tags){    
		return $tags;  
	}
  
?>
