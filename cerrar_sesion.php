<?php

	session_start();

	$_SESSION['id']=NULL;
	$_SESSION['tipo_cuenta']=NULL;
	$_SESSION['name']=NULL;



	header('Location:index.php');

?>