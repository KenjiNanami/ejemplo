<?php

    session_start();
    
    include("conex.php");

	$link=Conectarse();

    $id=$_SESSION['id'];
    $cuenta=$_SESSION['usu_tipo'];
    $name=$_SESSION['name'];

	$query="select elect_nom from crearp_electiva";

    mysqli_close($link);

    $link=Conectarse();


    if(!empty($_POST['codigo'])&&!empty($_POST['nombre'])&&!empty($_POST['profesor'])&&!empty($_POST['cupo'])&&!empty($_POST['desc'])){
        
        $codigo=$_POST['codigo'];
        $nombre=$_POST['nombre'];
        $profesor=$_POST['profesor'];
        $cupo=$_POST['cupo'];
        $desc=$_POST['desc'];
        
    $actualizar_electiva=mysqli_query($link,"update crearp_electiva set elect_nom='$nombre',elect_profesor='$profesor',elect_descripcion='$desc',elect_cupos='$cupo' where elect_cod='$codigo'");
       
         $_SESSION["actualizada"]="La Electiva identificada como $codigo, ha sido actualizada";
        
    }

    mysqli_close($link);

    $link=Conectarse();  

    if(!empty($_GET['id'])){
	
		$id=$_GET['id'];
	
		$eliminar_electiva=mysqli_query($link,"delete from crearp_electiva where elect_cod='$id'");	
        
        $_SESSION["eliminada"]="La Electiva identificada como $id, ha sido eliminada";
                                                                                               
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
         <?php include ("menu_administrador.php") ?>
        <div id="principal" align="center" class="row">
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
					<th><center>Borrar</center></th>
					<th><center>Editar</center></th>
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
             <td>
				<a href="#eliminar<?php echo $row['elect_cod'];?>" title="Borrar" role="button" class="button4 modal-trigger" style="width:60%;">
							<i class="fa fa-trash" style="font-size:24px"></i>
				</a>
                 
                
            <!-- Modal Delete -->
		<div class="modal" id="eliminar<?php echo $row['elect_cod']; ?>">
		  <form name="form53" method="post" action="">
                <div class="modal-content">
                    <table class="center">
                        <tr>
                            <td colspan="2">
                                
								<h6>Desea eliminar la electiva: <?php echo $row['elect_nom']; ?> </h6>
                                
							</td>
										
				        </tr>
                        <tr>
                            <td>
                                <button type="button" class="button button2 modal-close modal-action"  data-dismiss="modal" style="width:40%;"><strong>No</strong></button>
                            </td>
                            <td>
                                 <a href="consultar_electiva.php?id=<?php echo $row['elect_cod']; ?>" title="Borrar" class="button button1" style="width:40%;"><strong>Si</strong>
							     </a>
                            </td>
                        </tr>
                    </table>
              </div>
        </form>
    </div>

                    <!-- End Modal Delete Electiva-->
         
            </td>    
            <td><a href="#x<?php echo $row['elect_cod'];?>"  title="Editar" role="button" class="button4 modal-trigger" style="width:60%;"><i class="fa fa-search-plus" style="font-size:20px"></i></a>
          
              
    	<!-- Modal ING X USER -->
		<div class="modal" id="x<?php echo $row['elect_cod']; ?>">

		  <form name="form53" method="post" action="">
                <div class="modal-content">
                    <table class="center">
                        <tr>
                            <td colspan="2">
                                
								<h3>Actualizar Electiva</h3>
                                
							</td>
										
				        </tr>
						<tr>
                            <th>
                                  <strong> Codigo </strong><br>
                                    <input type="text" name="codigo" value="<?php echo $row['elect_cod']; ?>" autocomplete="off" readonly><br>
                             </th>

										
                             <th>
                                  <strong> Nombre </strong><br>
                                  <input type="text" name="nombre" value="<?php echo $row['elect_nom']; ?>" autocomplete="off" required><br>
                             </th>
										
										
                        </tr>

                        <tr>
                             <th>
                                  <strong> Profesor </strong><br>
                                  <input type="text" name="profesor" value="<?php echo $row['elect_profesor']; ?>" autocomplete="off" required><br>
                              </th>
                                        
                            <th>
                                 <strong> Cupos </strong><br>
                                 <input type="text" name="cupo" value="<?php echo $row['elect_cupos']; ?>" autocomplete="off" required><br>
                             </th>
						</tr>
				        <tr>	

                            <td colspan="2">
                                <div class="input-field col s12">
								    <textarea  name="desc" id="desc" class="materialize-textarea"><?php echo $row['elect_descripcion']?></textarea>
								    <label for="eje_desc">Descripción</label>
								</div>
                            </td>
									
                        </tr>
                        
                        <tr>
                            <td>
                                <button type="button" class="button button1 modal-close modal-action"  data-dismiss="modal" style="width:50%;"><i class="fa fa-remove" style="font-size:15px" ></i>   Cerrar</button>
                            </td>
                            <td>
                                <button type="submit" name="guardar" class="button button2" style="width:50%;"><strong><i class="fa fa-floppy-o" style="font-size:15px"></i> Guardar</strong></button>
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
	
		      if (isset($_SESSION["actualizada"])) { ?>
        
                <div class="alert alert-success" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <center><?php echo $_SESSION["actualizada"];?></center>
                </div>

                <?php 
                    unset($_SESSION["actualizada"]);}
                ?> 
            
            <?php
	
		      if (isset($_SESSION["eliminada"])) { ?>
        
                <div class="alert alert-success" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <center><?php echo $_SESSION["eliminada"];?></center>
                </div>

                <?php 
                    unset($_SESSION["eliminada"]);}
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