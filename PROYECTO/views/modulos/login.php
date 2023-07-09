<div id="formulario">
<h2 class="letra">Ingreso</h2>

<form method="post">
	<label for="Casa" class="letra">Usuario: </label>
	<br>
	<input type="Text" name="Casa" placeholder="Usuario" required class="letra">
	<br>
	<label for="passwordIngreso" class="letra">Contraseña: </label>
	<br>
	<input type="password" name="passwordIngreso" placeholder="Contraseña" required class="letra">
	<br>
	<div id="cajaBoton">
	<input type="submit" value="Entrar" class="letra boton" id="boton">
	</div>
</form>
</div>

<?php 

	$ingreso = new MvcController();
	$ingreso -> ingresoController();

	if(isset($_GET["action"])){
		if ($_GET["action"] == "fallo") {
			echo "<p>Datos Invalidos.</p>";
		}
	}
?>