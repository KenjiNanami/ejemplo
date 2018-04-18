<?php  

    include("conex.php");
    $link=Conectarse();
    session_start();
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $tipo=$_POST['tipo'];
    $documento=$_POST['documento'];
    $passw1=$_POST['passw1'];
    $passw2=$_POST['passw2'];
	$tipo_cuenta="Estudiante";
    $contra_hash=password_hash($passw1, PASSWORD_DEFAULT);

    $buscar_id=mysqli_query($link,"select usu_coduniv from crearp_usuarios where usu_coduniv='$documento'");

    mysqli_close($link);

    $link=Conectarse();

    if($passw1==$passw2){

        if(mysqli_num_rows($buscar_id) == 0){

            $registrarusu=mysqli_query($link,"insert into crearp_usuarios values ('$nombre','$apellido','$tipo','$documento','$contra_hash','$tipo_cuenta')");

            $_SESSION["registro"]="Felicitaciones,te has registrado exitosamente en nuestro sitio web";

            header("Location:index.php");

        }else{

            $_SESSION["denegado"]="Tu número de documento ya se encuentra registrado en nuestro sistema";

            header("Location:registrar_usuario.php");

        }
    }else{
        
        $_SESSION["contrasena"]="Las contraseñas no coinciden";

            header("Location:registrar_usuario.php");
        
    }

?>