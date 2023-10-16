<?php  
	session_start();
	$idUsuario = $_SESSION['id'];
	$familia = $_GET["numero"];
	$casa = $_GET["casa"];

	if (isset($idUsuario)){
		$agregar = new MvcController();
		$agregar -> familiasController();
?>

<h1>Llenar los datos de la familia.</h1>

<form method="post">

	<?php for ($i=1; $i <= $familia; $i++) { ?>

	<h2>Jefe de Familia <?php echo $i; ?>:</h2>
	<div class="linea"></div>
	<br>
	
	<label>Nombre:</label>
	<br>
	<input type="text" name="<?php echo $i;?>Nombre" placeholder="Nombre" required>
	<br>

	<label>Apellido:</label>
	<br>
	<input type="text" name="<?php echo $i;?>Apellido" placeholder="Apellido" required>
	<br>

	<label>Fecha de nacimiento:</label>
	<br>
	<input type="date" name="<?php echo $i;?>Fecha"  required>
	<br>

	<label>Cedula:</label>
	<br>
	<input type="number" name="<?php echo $i;?>Cedula" placeholder="Cedula" required>
	<br>

	<label>Nivel de instruccion:</label>
	<br>
	<input type="text" name="<?php echo $i;?>Instruccion" placeholder="Nivel de instruccion" required>
	<br>

	<label>Estudio:</label>
	<br>
	<input type="text" name="<?php echo $i;?>Estudio" placeholder="Estudio" required>
	<br>

	<label>Enfermedad que padece:</label>
	<br>
	<input type="text" name="<?php echo $i;?>Enfermedad" placeholder="Enfermedad que padece" required>
	<br>

	<label>Vacuna (Dosis):</label>
	<br>
	<select name="<?php echo $i;?>Vacuna">
		<option value="1">0</option>
		<option value="2">1</option>
		<option value="3">2</option>
		<option value="4">3</option>
	</select>
	<br>

	<label>Estado Civil:</label>
	<br>
	<select name="<?php echo $i;?>Civil">
		<option value="1">Soltero/a</option>
		<option value="2">Casado/a</option>
		<option value="3">Biudo/a</option>
	</select>
	<br>
	
	<label>Numero del Carmet de la Patia:</label>
	<br>
	<input type="number" name="<?php echo $i;?>Numero" placeholder="Numero del Carmet de la Patia" required>
	<br>

	<label>Serial del Carmet de la Patia:</label>
	<br>
	<input type="text" name="<?php echo $i;?>Serial" placeholder="Serial del Carmet de la Patia" required>
	<br>

	<label>Beneficio Especial de la Plataforma Patria:</label>
	<br>
	<select name="<?php echo $i;?>Beneficio">
		<option value="1">Protección Social</option>
		<option value="2">Hogares de la Patria</option>
		<option value="3">José Gregorio Hernández</option>
		<option value="4">Economía Familiar</option>
		<option value="5">100% Familia</option>
		<option value="6">Parto Humanisado</option>
		<option value="7">Lactancia Materna</option>
		<option value="8" selected>Ninguno</option>
	</select>
	<br>
	
	<label>Tipo de Condicion Especial:</label>
	<br>
	<select name="<?php echo $i;?>Condicion">
		<option value="1">Fìsica</option>
		<option value="2">Auditiva</option>
		<option value="3">Visual</option>
		<option value="4">Intelectual</option>
		<option value="5">Mental</option>
		<option value="6">Mùltiple</option>
		<option value="7" selected>Ninguno</option>
	</select>
	<br>

	<label>tipo de Habitacion:</label>
	<br>
	<select name="<?php echo $i;?>Habitacion">
		<option value="1" selected>Propia</option>
		<option value="2">Cuido</option>
		<option value="3">Alquilada</option>
	</select>
	<br>
	
	<?php } ?>

	<input type="hidden" name="casa" value="<?php echo $casa;?>">
	<input type="hidden" name="numero" value="<?php echo $familia;?>">

	<div id="cajaBoton">
	<input type="submit" value="guardar" class="letra boton" name="boton">
	</div>


</form>

<style type="text/css">
	@import "views/css/newadmin.css";
</style>
<?php 

	
  	}else{
    	header("location:index.php?action=login");
  	}
  
?>