<?php  
	session_start();
	$idUsuario = $_SESSION['id'];
	$id = $_GET["id"];

	if (isset($idUsuario)){
		
?>

<h1>Editar Jefe de familia.</h1>

<form method="post">
	
	<?php 
		$agregar = new MvcController();
		$agregar -> verjefeController();
	 ?>

	<div id="cajaBoton">
	<input type="submit" value="guardar" class="letra boton" name="boton">
	</div>


</form>

<style type="text/css">
	@import "views/css/newadmin.css";
</style>
<?php 
	
	$editar = new MvcController();
	$editar -> editarjefeController();
	
  	}else{
    	header("location:index.php?action=login");
  	}
  
?>