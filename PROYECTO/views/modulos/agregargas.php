<?php  
	session_start();
	$idUsuario = $_SESSION['id'];

	if (isset($idUsuario)){
		$id = $_GET["id"];
?>

<h1>Agregar Cilindro de Cas a la Casa <?php echo $id ?>.</h1>

<form method="post">

	<input type="hidden" name="id" value="<?php echo $id ?>">
	<label>Tipo:</label>
	<br>
	<select name="tipo">
		<option value="1" selected>Bengas</option>
		<option value="2">Barinesagas</option>
		<option value="3">Cocigas</option>
	</select>
	<br>
	<label>Peso:</label>
	<br>
	<select name="peso">
		<option value="1" selected>10kg</option>
		<option value="2">18kg</option>
		<option value="3">27kg</option>
		<option value="4">43kg</option>
	</select>
	<br>
	<label>cantidad:</label>
	<br>
	<input type="number" name="cantidad" placeholder="cantidad" required>
	<br>

	<div id="cajaBoton">
	<input type="submit" value="Editar" class="letra boton" name="boton">
	</div>
</form>

<style type="text/css">
	@import "views/css/newadmin.css";
</style>
<?php 
	
	$agregar = new MvcController();
	$agregar -> agregargasController();
	
  	}else{
    	header("location:index.php?action=login");
  	}
  
?>