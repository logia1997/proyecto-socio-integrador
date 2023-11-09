<?php  
	session_start();
	$idUsuario = $_SESSION['id'];

	if (isset($idUsuario)){
		$agregar = new MvcController();
		$agregar -> usuarioController();
?>
<h1>Crear un nuevo Usuario.</h1>
<form method="post">
	<h2>Usuario:</h2>
	<div class="linea"></div>
	<br>
	

	<label>Usuario:</label>
	<br>
	<input type="text" name="Usuario" placeholder="Usuario" required>
	<br>
	<label>Contraseña:</label>
	<br>
	<input type="text" name="Contraseña" placeholder="Contraseña" required>
	<br>

	<h2>Casa:</h2>
	<div class="linea"></div>
	<br>
	

	<label>Sector:</label>
	<br>
	<select name="Sector">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
	</select>
	<br>
	<label>Numero de Casa:</label>
	<br>
	<input type="number" name="Casa" placeholder="Numero de Casa" required>
	<br>
	<label>Calle:</label>
	<br>
	<select name="Calle">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>
		<option value="31">31</option>
		<option value="32">32</option>
	</select>
	<br>
	<label>Lado:</label>
	<br>
	<select name="Lado">
		<option value="1">A</option>
		<option value="2">B</option>
	</select>
	<br>
	<label>Telefono de Casa:</label>
	<br>
	<input type="number" name="TelefonoCasa" placeholder="Telefono de Casa" required>
	<br>
	<br>

	<h2>Bonbonas</h2>
	<div class="linea"></div>
	<br>
	
	<h4>Bengas:</h4>
	<div class="linea2"></div>
		<br>

	<label>Cilindtro de 10kg:</label>
	<br>
	<input type="number" name="Bengas10kg" placeholder="Cantidad" value="0" required>
	<br>
	<label>Cilindtro de 18kg:</label>
	<br>
	<input type="number" name="Bengas18kg" placeholder="Cantidad" value="0" required>
	<br>
	<label>Cilindtro de 27kg:</label>
	<br>
	<input type="number" name="Bengas27kg" placeholder="Cantidad" value="0" required>
	<br>
	<label>Cilindtro de 43kg:</label>
	<br>
	<input type="number" name="Bengas43kg" placeholder="Cantidad" value="0" required>
	<br>

	<h4>Barinesagas:</h4>
	<div class="linea2"></div>
	<br>

	<label>Cilindtro de 10kg:</label>
	<br>
	<input type="number" name="Barinesagas10kg" placeholder="Cantidad" value="0" required>
	<br>
	<label>Cilindtro de 18kg:</label>
	<br>
	<input type="number" name="Barinesagas18kg" placeholder="Cantidad" value="0" required>
	<br>
	<label>Cilindtro de 27kg:</label>
	<br>
	<input type="number" name="Barinesagas27kg" placeholder="Cantidad" value="0" required>
	<br>
	<label>Cilindtro de 43kg:</label>
	<br>
	<input type="number" name="Barinesagas43kg" placeholder="Cantidad" value="0" required>
	<br>

	<h4>Cocigas:</h4>
	<div class="linea2"></div>
	<br>

	<label>Cilindtro de 10kg:</label>
	<br>
	<input type="number" name="Cocigas10kg" placeholder="Cantidad" value="0" required>
	<br>
	<label>Cilindtro de 18kg:</label>
	<br>
	<input type="number" name="Cocigas18kg" placeholder="Cantidad" value="0" required>
	<br>
	<label>Cilindtro de 27kg:</label>
	<br>
	<input type="number" name="Cocigas27kg" placeholder="Cantidad" value="0" required>
	<br>
	<label>Cilindtro de 43kg:</label>
	<br>
	<input type="number" name="Cocigas43kg" placeholder="Cantidad" value="0" required>
	<br>
	<br>

	<h2>Familias</h2>
	<div class="linea"></div>
	<br>
	

	<label>Numero de familias:</label>
	<br>
	<input type="number" name="Familias" placeholder="Cantidad" required>
	<br>

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