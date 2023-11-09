<?php  
	session_start();
	$idUsuario = $_SESSION['id'];

	if (isset($idUsuario)){
		$id = $_GET["id"];
		$tipo = $_GET["tipo"];
		$peso = $_GET["peso"];
		$cantidad = $_GET["cantidad"];
		
?>

<h1>Seguro que quieres eliminar el cilindro.</h1>

<form method="post">

	<input type="hidden" name="id" value="<?php echo $id;?>" readonly>
	<label>Tipo:</label>
	<br>
	<input type="text" name="tipo" value="<?php echo $tipo;?>" readonly>
	<br>
	<label>Peso:</label>
	<br>
	<input type="text" name="peso" value="<?php echo $peso;?>" readonly>
	<br>
	<label>Cantidad:</label>
	<br>
	<input type="text" name="cantidad" value="<?php echo $cantidad;?>" readonly>
	<br>
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
	$agregar -> eliminargasController();

	
  	}else{
    	header("location:index.php?action=login");
  	}
  
?>