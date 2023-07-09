<?php  
	session_start();
	$idUsuario = $_SESSION['id'];

	if (isset($idUsuario)){
		$id = $_GET["id"];
		$user = $_GET["user"];
		$permiso = $_GET["permiso"];
		
?>

<h1>Seguro que quieres eliminar al Usuario.</h1>

<form method="post">

	<input type="hidden" name="id" value="<?php echo $id;?>" readonly>
	<label>Usuario:</label>
	<br>
	<input type="text" name="Usuario" placeholder="Usuario" value="<?php echo $user;?>" readonly>
	<br>
	<label>Permiso:</label>
	<br>
	<input type="text" name="Usuario" placeholder="Usuario" value="<?php echo $permiso;?>" readonly>
	<div id="cajaBoton">
	<input type="submit" value="Si" class="letra boton eliminar" name="Si">
	<input type="submit" value="No" class="letra boton eliminar no" name="No">
	</div>
</form>

<style type="text/css">
	@import "views/css/newadmin.css";
</style>
<?php 

 	$agregar = new MvcController();
	$agregar -> eliminarController();

	
  	}else{
    	header("location:index.php?action=login");
  	}
  
?>