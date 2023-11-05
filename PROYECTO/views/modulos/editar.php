<?php  
	session_start();
	$idUsuario = $_SESSION['id'];

	if (isset($idUsuario)){
		$id = $_GET["id"];
		$user = $_GET["user"];
		$pass = $_GET["pass"];
		$permiso = $_GET["permiso"];
		
?>

<h1>Editar un <?php echo $permiso; ?>.</h1>

<form method="post">

	<input type="hidden" name="id" value="<?php echo $id;?>" readonly>
	<label>Usuario:</label>
	<br>
	<input type="text" name="Usuario" placeholder="Usuario" value="<?php echo $user;?>" required>
	<br>
	<label>Contraseña:</label>
	<br>
	<input type="text" name="Contraseña" placeholder="Contraseña" value="<?php echo $pass;?>" required>
	<br>
	<label>Permiso:</label>
	<br>
	<select name="Permiso">
		<option value="1" <?php if ($permiso == "Master") { echo "selected";} ?>>Administrador</option>
		<option value="3" <?php if ($permiso == "Agua") { echo "selected";} ?>>Agua</option>
		<option value="4" <?php if ($permiso == "Clap") { echo "selected";} ?>>Clap</option>
		<option value="5" <?php if ($permiso == "Gas") { echo "selected";} ?>>Gas</option>
		<option value="6" <?php if ($permiso == "Foro") { echo "selected";} ?>>Foro</option>
		<option value="7" <?php if ($permiso == "Jefe de Calle") { echo "selected";} ?>>Jefe de Calle</option>
	</select>
	<div id="cajaBoton">
	<input type="submit" value="Editar" class="letra boton" name="boton">
	</div>
</form>

<style type="text/css">
	@import "views/css/newadmin.css";
</style>
<?php 

 	$agregar = new MvcController();
	$agregar -> editarController();

	
  	}else{
    	header("location:index.php?action=login");
  	}
  
?>