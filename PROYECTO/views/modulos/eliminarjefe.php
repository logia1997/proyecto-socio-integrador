<?php  
	session_start();
	$idUsuario = $_SESSION['id'];

	if (isset($idUsuario)){
		$id = $_GET["id"];
		$habitacion = $_GET["habitacion"];
		$ci = $_GET["ci"];
		$nombre = $_GET["nombre"];
		$apellido = $_GET["apellido"];
		
?>

<h1>Seguro que quieres eliminar el jefe de familia.</h1>

<form method="post">

	<input type="hidden" name="id" value="<?php echo $id;?>" readonly>
	<label>Habitacio:</label>
	<br>
	<input type="text" name="habitacion" value="<?php echo $habitacion;?>" readonly>
	<br>
	<label>Cedula:</label>
	<br>
	<input type="text" name="ci" value="<?php echo $ci;?>" readonly>
	<br>
	<label>Nombre:</label>
	<br>
	<input type="text" name="nombre" value="<?php echo $nombre;?>" readonly>
	<br>
	<label>Apellido:</label>
	<br>
	<input type="text" name="apellido" value="<?php echo $apellido;?>" readonly>
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
	$agregar -> eliminarjefeController();

	
  	}else{
    	header("location:index.php?action=login");
  	}
  
?>