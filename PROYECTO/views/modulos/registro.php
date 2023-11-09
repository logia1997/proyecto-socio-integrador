<h1>Registro De Usuario</h1>

<form method="post">
	
	<label for="Nombres">Nombres: </label>
	<input type="tex" id="Nombres" name="Nombres" placeholder="Nombres">
	<br>
	<label for="Apellidos">Apellidos: </label>
	<input type="tex" id="Apellidos" name="Apellidos" placeholder="Apellidos">
	<br>
	<label for="identificacion">Identificacion: </label>
	<input type="number" id="identificacion" name="identificacion" placeholder="Identificacion" required>
	<select id="tipoIdentificacicon" name="tipoIdentificacicon">
		<option value="V">V</option>
		<option value="E">E</option>
		<option value="P">P</option>
	</select>
	<br>
	<label for="Nacionalidad">Nacionalidad: </label>
	<select id="Nacionalidad" name="Nacionalidad">
		<option value="1">V</option>
		<option value="2">E</option>
	</select>
	<br>
	<label for="Sexo">Sexo: </label>
	<select id="Sexo" name="Sexo">
		<option value="1">Hombre</option>
		<option value="2">Mujer</option>
		<option value="3">Indefinido</option>
	</select>
	<br>
	<label for="email">Correo: </label>
	<input type="email" id="email" name="email" placeholder="Correo" required>
	<br>
	<label>Telefonos :</label>
	<br>
	<label for="movil">Movil: </label>
	<input type="number" name="movil" id="movil">
	<label for="Casa">Casa: </label>
	<input type="number" name="Casa" id="Casa">
	<br>
	<label for="Estado">Estado: </label>
	<select id="Estado" name="Estado">
		<option value="1">Barinas</option>
	</select>
	<br>
	<label for="Municipio">Municipio: </label>
	<select id="Municipio" name="Municipio">
		<option value="1">Barinas</option>
		<option value="2">Bolivar</option>
		<option value="3">Obispos</option>
		<option value="4">Pedraza</option>
	</select>
	<br>
	<label for="Parroquia">Parroquia: </label>
	<select id="Parroquia" name="Parroquia">
		<option value="1">Barinas</option>
		<option value="2">Bolivar</option>
		<option value="3">Altamira</option>
		<option value="4">La Luz</option>
		<option value="5">Obispos</option>
		<option value="6">Peez</option>
	</select>
	<br>
	<label for="Direccion">Direccion; </label>
	<input type="tex" id="Direccion" name="Direccion" placeholder="Especifica">
	<br>
	<label for="Universidad">Universidad: </label>
	<select id="Universidad" name="Universidad">
		<option value="1">UPT Jose Felix Ribas</option>
	</select>
	<br>
	<label for="Sede">Sede: </label>
	<select id="Sede" name="Sede">
		<option value="1">Barinas</option>
		<option value="2">Barinitas</option>
		<option value="3">Pedraza</option>
		<option value="4">Socopo</option>
	</select>
	<br>
	<label for="PNF">PNF: </label>
	<select id="PNF" name="PNF">
		<option value="1">Sistema</option>
		<option value="2">Agro</option>
		<option value="3">Mecanica</option>
		<option value="4">Electrica</option>
	</select>
	<br>
	<label for="Vacuna">Vacuna: </label>
	<select id="Vacuna" name="Vacuna">
		<option value="1">si</option>
		<option value="2">no</option>
	</select>
	<br>
	<label for="password">Contracña: </label>
	<input type="password" id="password" name="password" placeholder="Contraceña" required>
	<br>
	<input type="submit" value="Registrar" name="boton">
</form>

<a href="index.php?action=ingreso">Ingresar</a>
<?php 

	$registro = new MvcController();
	$registro -> registroController();

	if(isset($_GET["action"])){
		if ($_GET["action"] == "ok") {
			echo "Registro Exitoso.";
		}
	}
?>