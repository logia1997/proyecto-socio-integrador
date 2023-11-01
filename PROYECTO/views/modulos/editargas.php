<?php  
	session_start();
	$idUsuario = $_SESSION['id'];

	if (isset($idUsuario)){
		$id = $_GET["id"];
?>

<h1>Editar Cilindro de Gas.</h1>

<form method="post">

	<input type="hidden" name="id" value="<?php echo $id ?>">
	<input type="hidden" name="casa" value="<?php echo $_GET['casa'] ?>">
	<label>Tipo:</label>
	<br>
	<select name="tipo">
		<option value="1" <?php if ($_GET["tipo"] == "Bengas") { echo "selected";} ?>>Bengas</option>
		<option value="2" <?php if ($_GET["tipo"] == "Barinesagas") { echo "selected";} ?>>Barinesagas</option>
		<option value="3" <?php if ($_GET["tipo"] == "Cocigas") { echo "selected";} ?>>Cocigas</option>
	</select>
	<br>
	<label>Peso:</label>
	<br>
	<select name="peso">
		<option value="1" <?php if ($_GET["peso"] == "10") { echo "selected";} ?>>10kg</option>
		<option value="2" <?php if ($_GET["peso"] == "18") { echo "selected";} ?>>18kg</option>
		<option value="3" <?php if ($_GET["peso"] == "27") { echo "selected";} ?>>27kg</option>
		<option value="4" <?php if ($_GET["peso"] == "43") { echo "selected";} ?>>43kg</option>
	</select>
	<br>
	<label>cantidad:</label>
	<br>
	<input type="number" name="cantidad" value="<?php echo $_GET['cantidad'] ?>" required>
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
	$agregar -> editargasController();
	
  	}else{
    	header("location:index.php?action=login");
  	}
  
?>