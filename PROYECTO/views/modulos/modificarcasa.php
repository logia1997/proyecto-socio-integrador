<?php  
	session_start();
	$idUsuario = $_SESSION['id'];

	if (isset($idUsuario)){
		$id = $_GET["id"];
?>

<h1>Editar Usuatrio.</h1>

<form method="post">


	<?php  
		$datos = new MvcController();
		$datos -> datoscasaController();
	?>	
	
	
	<a href='index.php?action=modificargas&id=<?php echo"$id" ?>'>
		<p>Editar Informacion de los Cilindors del Gass</p>
	</a>

	<a href='index.php?action=modificarjefe&id=<?php echo"$id" ?>'>
		<p>Editar Informacion de los Jefes de familia</p>
	</a>

	<div id="cajaBoton">
	<input type="submit" value="Editar" class="letra boton" name="boton">
	</div>
</form>

<style type="text/css">
	@import "views/css/newadmin.css";
</style>
<?php 
	
	$agregar = new MvcController();
	$agregar -> modificarcasaController();
	
  	}else{
    	header("location:index.php?action=login");
  	}
  
?>