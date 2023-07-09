<?php  
	session_start();
	$idUsuario = $_SESSION['id'];

	if (isset($idUsuario)){
?>

<h1>Peticiones.</h1>

<form method="post">

	<h2>Vacuna:</h2>
	<div class="linea"></div>
	<br>
	
	<label>Docis:</label>
	<br>
	<select name="docis">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="*">Todos</option>
	</select>
	
	<br>
	<input type="submit" value="Generar" class="letra boton" name="p1">
	<?php
	if (isset($_POST["p1"])){
		$agregar = new MvcController();
		$agregar -> peticionesController();
	}
	?>

	<h2>Beneficio:</h2>
	<div class="linea"></div>
	<br>
	
	<select name="beneficio">
		<option value="1">Protección Social</option>
		<option value="2">Hogares de la Patria</option>
		<option value="3">José Gregorio Hernández</option>
		<option value="4">Economía Familiar</option>
		<option value="5">100% Familia</option>
		<option value="6">Parto Humanisado</option>
		<option value="7">Lactancia Materna</option>
		<option value="8">Ninguno</option>
		<option value="*">Todos</option>
	</select>
	<br>
	
	<input type="submit" value="Generar" class="letra boton" name="p2">
	<?php
	if (isset($_POST["p2"])){
		$agregar = new MvcController();
		$agregar -> peticionesController();
	}
	?>

	<h2>Condicion Especial:</h2>
	<div class="linea"></div>
	
	<br>
	<select name="condicion">
		<option value="1">Fìsica</option>
		<option value="2">Auditiva</option>
		<option value="3">Visual</option>
		<option value="4">Intelectual</option>
		<option value="5">Mental</option>
		<option value="6">Mùltiple</option>
		<option value="7">Ninguno</option>
		<option value="*">Todos</option>
	</select>
	<br>
	
	<input type="submit" value="Generar" class="letra boton" name="p3">
	<?php
	if (isset($_POST["p3"])){
		$agregar = new MvcController();
		$agregar -> peticionesController();
	}
	?>

	<h2>Edad:</h2>
	<div class="linea"></div>
	<br>
	
	<select name="edad">
		<option value="1">Nenor de 12años</option>
		<option value="2">Mayor de 15años</option>
		<option value="3">Mayor de 60años</option>
	</select>
	<br>
	
	<input type="submit" value="Generar" class="letra boton" name="p4">
	<?php
	if (isset($_POST["p4"])){
		$agregar = new MvcController();
		$agregar -> peticionesController();
	}
	?>

	<h2>Cilindro del gas:</h2>
	<div class="linea"></div>
	<br>
	
	<label>Tipo:</label>
	<br>
	<select name="tipo">
		<option value="1">Bengas</option>
		<option value="2">Barinesagas</option>
		<option value="3">Cocigas</option>
	</select>
	<br>
	<label>Peso:</label>
	<br>
	<select name="peso">
		<option value="1">10kg</option>
		<option value="2">18kg</option>
		<option value="3">27kg</option>
		<option value="4">43kg</option>
	</select>
	<br>
	
	<input type="submit" value="Generar" class="letra boton" name="p5">
	<?php
	if (isset($_POST["p5"])){
		$agregar = new MvcController();
		$agregar -> peticionesController();
	}
	?>
</form>

<style type="text/css">
	@import "views/css/newadmin.css";
	@import "views/css/permisos.css";
</style>
<?php

	
  	}else{
    	header("location:index.php?action=login");
  	}
  
?>