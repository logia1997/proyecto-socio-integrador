<?php  
	session_start();
	$idUsuario = $_SESSION['id'];

	if (isset($idUsuario)){
		$permiso = $_GET["permiso"];
		$id = $_GET["id"];
		
?>

<h1>Agregar un nuevo <?php echo $permiso; ?>.</h1>

<form method="post">
	<label>Usuario:</label>
	<br>
	<input type="text" name="Usuario" placeholder="Usuario" required>
	<br>
	<label>Contraseña:</label>
	<br>
	<input type="password" name="Contraseña" placeholder="Contraseña" required>
	<br>
	<label>Permiso:</label>
	<br>
	<select name="Permiso">
		<option value="1">Administrador</option>
		<option value="7">Jefe de calle</option>
		<option value="3">Agua</option>
		<option value="4">CLAP</option>
		<option value="5">Foro</option>
		<option value="6">Gas</option>
		
	</select>
	<div id="cajaBoton">
	<input type="submit" value="Crear" class="letra boton" name="boton">
	</div>
</form>

<style type="text/css">
	@import "views/css/newadmin.css";
</style>
<?php 


 	$agregar = new MvcController();
	$agregar -> adminController();

	
  	}else{
    	header("location:index.php?action=login");
  	}
  
?>
