<?php  

	class MvcController{

		/*LLAMADA A LA PLANTILLA DEL LOGIN*/
		
		public function plantillaUno(){
			include "views/template.php";
		}

		/*INTERACCION CON LAS PAGINAS*/

		public function enlacesPaginasController(){
	
			if (isset($_GET["action"])) {
				$enlaces = $_GET["action"]; 
			}else{
				$enlaces = "index";
			}

			$respuesta = enlacesPaginas::enlacespaginasModel($enlaces);

			include $respuesta;
		}

		/*Inicio de cesion*/

		public function ingresoController(){
			
			if (isset($_POST["Casa"])){
				$datosC = array( 'usuario'=>$_POST["Casa"], 
						   		 'password'=>$_POST["passwordIngreso"]);

				$respuesta = Datos::ingresoModel($datosC, "usuario");

				/*verificacion de los datos*/

				if( $respuesta["usuario"] == $_POST["Casa"] &&
					$respuesta["password"] == $_POST["passwordIngreso"]){

					/*inicio de la sesion*/

					session_start();

					$_SESSION['id'] = $respuesta["id"];
					header("location:index.php?action=".$respuesta["permiso"]);
					
					
			

				}else{

					header("location:index.php?action=fallo");

				}
			}
		}
			
		/*tabla de administradores*/

		/*	version anterior
		public function permisosController(){
			
			if (isset($_POST["occion"])){
				$datosC = $_POST["occion"];

				

				$respuesta = Datos::permisosModel($datosC, "usuario");
				$permiso = Datos::tipoPermisoModel($datosC, "permiso");
				$i=0;

				echo "	<div class='contenedor_tabla'>
				<table class='lista_usuarios'>
							<thead class='.cabecera2'>
								<tr>
									<td>Usuario</td>
									<td>Contraseña</td>
									<td>Tipo de usuario</td>
									<td>
										<a href='index.php?action=agregar&id=".$datosC."&permiso=".$permiso [$i][0]."' title='Agregar'>
										<img src='views/css/mas.png' class='icono'>
										</a>
									</td>
								</tr>
							</thead>
							<tbody>";
				while ($i < count($respuesta)){ 
					echo "
								<tr>
									<td>".$respuesta [$i][1]. "</td>
									<td>".$respuesta [$i][2]."</td>
									<td>".$respuesta [$i][3]."</td>
									<td>
										<a href='index.php?action=editar&id=".$respuesta [$i][0]."&user=".$respuesta [$i][1]."&pass=".$respuesta [$i][2]."&permiso=".$respuesta [$i][3]."' title='Editar'>	
										<img src='views/css/editar.png' class='icono'>
										</a>";
					if ($respuesta [$i][0] != 1) {
						echo "			| <a href='index.php?action=eliminar&id=".$respuesta [$i][0]."&user=".$respuesta [$i][1]."&permiso=".$respuesta [$i][3]."' title='Eliminar'>
											<img src='views/css/eliminar.png' class='icono'>
										</a>";
					}
					echo			"</td>
								</tr>";
					$i++;
				}
				echo "		</tbody>
						</table>
						</div>";
						
					
			}
		}*/

		public function permisosController(){
			
			if (isset($_POST["occion"])){
				$datosC = $_POST["occion"];

				echo '	
				<form method="post">
					<select name="Permiso">
						<option value="Master" >Administrador</option>
						<option value="Usuario" >Usuiario</option>
						<option value="Agua" >Agua</option>
						<option value="Clap" >Clap</option>
						<option value="Gas" >Gas</option>
						<option value="Foro" >Foro</option>
						<option value="Jefe de Calle" >Jefe de Calle</option>
						<option value="*" selected>Todos</option>
					</select>
					<div id="cajaBoton">
						<input type="submit" value="Filtrar" class="letra boton" name="boton">
					</div>
				</form>	
				';

				$respuesta = Datos::permisosModel($datosC, "usuario");
				$permiso = Datos::tipoPermisoModel($datosC, "permiso");
				$i=0;


				echo "	<div class='contenedor_tabla'>
				<table class='lista_usuarios'>
							<thead class='.cabecera2'>
								<tr>
									<td>Usuario</td>
									<td>Contraseña</td>
									<td>Tipo de usuario</td>
									<td>
										<a href='index.php?action=agregar&id=".$datosC."&permiso=".$permiso [$i][0]."' title='Agregar'>
										<img src='views/css/mas.png' class='icono'>
										</a>
									</td>
								</tr>
							</thead>
							<tbody>";
				while ($i < count($respuesta)){ 
					if (isset($_POST["Permiso"])){
						$permiso = $_POST["Permiso"];

						if ($respuesta [$i][3] == $permiso){
							echo "
									<tr>
										<td>".$respuesta [$i][1]. "</td>
										<td>".$respuesta [$i][2]."</td>
										<td>".$respuesta [$i][3]."</td>
										<td>
											<a href='index.php?action=editar&id=".$respuesta [$i][0]."&user=".$respuesta [$i][1]."&pass=".$respuesta [$i][2]."&permiso=".$respuesta [$i][3]."' title='Editar'>	
											<img src='views/css/editar.png' class='icono'>
											</a>";
							if ($respuesta [$i][0] != 1) {
								echo "			| <a href='index.php?action=eliminar&id=".$respuesta [$i][0]."&user=".$respuesta [$i][1]."&permiso=".$respuesta [$i][3]."' title='Eliminar'>
													<img src='views/css/eliminar.png' class='icono'>
												</a>";

							}
								echo			"</td>
											</tr>";
						}
						
					}else{
						echo "
									<tr>
										<td>".$respuesta [$i][1]. "</td>
										<td>".$respuesta [$i][2]."</td>
										<td>".$respuesta [$i][3]."</td>
										<td>
											<a href='index.php?action=editar&id=".$respuesta [$i][0]."&user=".$respuesta [$i][1]."&pass=".$respuesta [$i][2]."&permiso=".$respuesta [$i][3]."' title='Editar'>	
											<img src='views/css/editar.png' class='icono'>
											</a>";
							if ($respuesta [$i][0] != 1) {
								echo "			| <a href='index.php?action=eliminar&id=".$respuesta [$i][0]."&user=".$respuesta [$i][1]."&permiso=".$respuesta [$i][3]."' title='Eliminar'>
													<img src='views/css/eliminar.png' class='icono'>
												</a>";

							}
								echo			"</td>
											</tr>";
						}				
					$i++;
				}
				echo "		</tbody>
						</table>
						</div>";
						
					
			}
		}

		/*creacion de admins*/

		public function adminController(){
			
			if (isset($_POST["Usuario"])){
				$datosC = array( 'usuario'=>$_POST["Usuario"], 
						   		 'password'=>$_POST["Contraseña"],
						   		 'permiso'=>$_POST["Permiso"]);

				$respuesta = Datos::adminModel($datosC, "usuario");

				if($respuesta=="success"){
					header("location:index.php?action=Master");
				}else{
					echo "<p>Error</p>";;
				}
			}else if (isset($_POST["boton"])){
				echo "<p>Llene todas las casillas</p>";
			}
		}

		/*editar admins*/

		public function editarController(){
			
			if (isset($_POST["Usuario"])){
				$datosC = array( 'id'=>$_POST["id"],
								 'usuario'=>$_POST["Usuario"], 
						   		 'password'=>$_POST["Contraseña"],
						   		 'permiso'=>$_POST["Permiso"]);

				$respuesta = Datos::editarModel($datosC, "usuario");

				if($respuesta=="success"){
					header("location:index.php?action=Master");
				}else{
					echo "<p>Error</p>";;
				}
			}else if (isset($_POST["boton"])){
				echo "<p>Error</p>";
			}
		}

		/*eliminar admins*/

		public function eliminarController(){
			
			if (isset($_POST["Si"])){
				$datosC = $_POST["id"];

				$respuesta = Datos::eliminarModel($datosC, "usuario");

				if($respuesta=="success"){
					header("location:index.php?action=Master");
				}else{
					echo "<p>Error</p>";;
				}
			}else if (isset($_POST["No"])){
				header("location:index.php?action=Master");
			}
		}

		public function usuarioController(){
			
			if (isset($_POST["Usuario"])){
				$datosC = array( 'usuario'=>$_POST["Usuario"], 
						   		 'password'=>$_POST["Contraseña"],
						   		 'permiso'=> 2,
						   		 'sector'=>$_POST["Sector"],
						   		 'casa'=>$_POST["Casa"],
						   		 'calle'=>$_POST["Calle"],
						   		 'lado'=>$_POST["Lado"],
						   		 'tlf'=>$_POST["TelefonoCasa"]);

				$familias = $_POST["Familias"];

				$respuesta = Datos::usuarioModel($datosC, "usuario");

				if ($respuesta=="success") {
					$respuesta = Datos::casaModel($datosC, "casa");
				}

				if (isset($_POST["Bengas10kg"]) && $_POST["Bengas10kg"] > 0 ){
					$respuesta = Datos::gasModel($datosC, "gas", $_POST["Bengas10kg"], "1", "1");
				}

				if (isset($_POST["Bengas18kg"]) && $_POST["Bengas18kg"] > 0 ){
					$respuesta = Datos::gasModel($datosC, "gas", $_POST["Bengas18kg"], "1", "2");
				}

				if (isset($_POST["Bengas27kg"]) && $_POST["Bengas27kg"] > 0 ){
					$respuesta = Datos::gasModel($datosC, "gas", $_POST["Bengas27kg"], "1", "3");
				}

				if (isset($_POST["Bengas43kg"]) && $_POST["Bengas43kg"] > 0 ){
					$respuesta = Datos::gasModel($datosC, "gas", $_POST["Bengas43kg"], "1", "4");
				}

				if (isset($_POST["Barinesagas10kg"]) && $_POST["Barinesagas10kg"] > 0 ){
					$respuesta = Datos::gasModel($datosC, "gas", $_POST["Barinesagas10kg"], "2", "1");
				}

				if (isset($_POST["Barinesagas18kg"]) && $_POST["Barinesagas18kg"] > 0 ){
					$respuesta = Datos::gasModel($datosC, "gas", $_POST["Barinesagas18kg"], "2", "2");
				}

				if (isset($_POST["Barinesagas27kg"]) && $_POST["Barinesagas27kg"] > 0 ){
					$respuesta = Datos::gasModel($datosC, "gas", $_POST["Barinesagas27kg"], "2", "3");
				}

				if (isset($_POST["Barinesagas43kg"]) && $_POST["Barinesagas43kg"] > 0 ){
					$respuesta = Datos::gasModel($datosC, "gas", $_POST["Barinesagas43kg"], "2", "4");
				}

				if (isset($_POST["Cocigas10kg"]) && $_POST["Cocigas10kg"] > 0 ){
					$respuesta = Datos::gasModel($datosC, "gas", $_POST["Cocigas10kg"], "3", "1");
				}

				if (isset($_POST["Cocigas18kg"]) && $_POST["Cocigas18kg"] > 0 ){
					$respuesta = Datos::gasModel($datosC, "gas", $_POST["Cocigas18kg"], "3", "2");
				}

				if (isset($_POST["Cocigas27kg"]) && $_POST["Cocigas27kg"] > 0 ){
					$respuesta = Datos::gasModel($datosC, "gas", $_POST["Cocigas27kg"], "3", "3");
				}

				if (isset($_POST["Cocigas43kg"]) && $_POST["Cocigas43kg"] > 0 ){
					$respuesta = Datos::gasModel($datosC, "gas", $_POST["Cocigas43kg"], "3", "4");
				}



				if($respuesta=="success"){
					header("location:index.php?action=familias&numero=".$familias."&casa=".$_POST["Casa"]."");
				}else{
					echo "<p>Error</p>";;
				}

			}else if (isset($_POST["boton"])){
				echo "<p>Llene todas las casillas</p>";
			}
		}


		public function familiasController(){
			
			if (isset($_POST["numero"])) {

				for ($i=1; $i <= $_POST["numero"]; $i++) {
					$idJefe;
					if($i==1){
						$datosC = array('cedula'=>$_POST["".$i."Cedula"],
								   		 'casa'=>$_POST["casa"],
								   		 'habitacion'=>$_POST["".$i."Habitacion"],
								   		 'jefe'=>$_POST["".$i."Cedula"]);
						$idJefe=$_POST["".$i."Cedula"];
						$respuesta = Datos::familiaModel($datosC, "grupofamiliar");
					}

					if (isset($_POST["".$i."Nombre"])){
						$datosC = array( 'nombre'=>$_POST["".$i."Nombre"], 
								   		 'apellido'=>$_POST["".$i."Apellido"],
								   		 'fecha'=>$_POST["".$i."Fecha"],
								   		 'cedula'=>$_POST["".$i."Cedula"],
								   		 'instruccion'=>$_POST["".$i."Instruccion"],
								   		 'estudio'=>$_POST["".$i."Estudio"],
								   		 'enfermedad'=>$_POST["".$i."Enfermedad"],
								   		 'vacuna'=>$_POST["".$i."Vacuna"],
								   		 'civil'=>$_POST["".$i."Civil"],
								   		 'numero'=>$_POST["".$i."Numero"],
								   		 'serial'=>$_POST["".$i."Serial"],
								   		 'beneficio'=>$_POST["".$i."Beneficio"],
								   		 'condicion'=>$_POST["".$i."Condicion"],
								   		 'casa'=>$_POST["casa"],
								   		 'habitacion'=>$_POST["".$i."Habitacion"],
								   		 'jefe'=>$idJefe);

						
						$respuesta = Datos::personaModel($datosC, "persona");
					}
				}

				if($respuesta=="success"){
					header("location:index.php?action=modificar");
				}
			}else if (isset($_POST["boton"])){
				echo "<p>Llene todas las casillas</p>";
			}
		}

		public function modificarController(){
			
			$respuesta = Datos::todoModel("casa");

			echo "	<table>
							<thead>
								<tr>
									<th>Casa</th>
									<th>Calle</th>
									<th>Telefono</th>
									<th>Modificar</th>
								</tr>
							</thead>
							<tbody>";
			$i=0;
			while ($i < count($respuesta)){ 
				echo "
								<tr>
									<td>".$respuesta [$i][0]."</td>
									<td>".$respuesta [$i][2]."</td>
									<td>".$respuesta [$i][4]."</td>
									<td>
										<a href='index.php?action=modificarcasa&id=".$respuesta [$i][0]."'>
											<img src='views/css/editar.png' class='icono'>
										</a>
									</td>
								</tr>";
					$i++;
			}
			echo "			</tbody>
					</table>";	
		}

		public function datoscasaController(){
			
			$respuesta = Datos::datoscasaModel($_GET['id']);
			
			echo "
				<h2>Casa: ".$respuesta[0][0]."</h2>
				<br>
				<input type='hidden' name='casa' value=".$respuesta[0][0]." required>
				<input type='hidden' name='id' value=".$respuesta[0][7]." required>
				<br>
				<label>Calle:</label>
				<br>
				<input type='text' name='calle' value=".$respuesta[0][1]." required>
				<br>
				<label>Telefono:</label>
				<br>
				<input type='text' name='telefono' value=".$respuesta[0][2]." required>
				<br>
				<label>Lado:</label>
				<br>
				<select name='Lado'>
					<option value='1' "; if ($respuesta[0][3] == "1") { echo "selected";} echo ">A</option>
					<option value='2' "; if ($respuesta[0][3] == "2") { echo "selected";} echo ">B</option>
				</select>
				<br>
				<label>Usuario:</label>
				<br>
				<input type='text' name='usuario' value=".$respuesta[0][4]." required>
				<br>
				<label>Contraseña:</label>
				<br>
				<input type='text' name='contraseña' value=".$respuesta[0][5]." required>
				<br>
				<label>Sector:</label>
				<br>
				<select name='sector'>
					<option value='1' "; if ($respuesta[0][6] == "1") { echo "selected";} echo ">1</option>
					<option value='2' "; if ($respuesta[0][6] == "2") { echo "selected";} echo ">2</option>
					<option value='3' "; if ($respuesta[0][6] == "3") { echo "selected";} echo ">3</option>
					<option value='4' "; if ($respuesta[0][6] == "4") { echo "selected";} echo ">4</option>
				</select>
				<br>
			";
		}

		public function modificarcasaController(){
			
			if (isset($_POST["casa"])){
				$datosC = array( 'casa'=>$_POST["casa"],
								 'calle'=>$_POST["calle"],
								 'tlf'=>$_POST["telefono"],
								 'lado'=>$_POST["Lado"],
								 'id'=>$_POST["id"],
								 'usuario'=>$_POST["usuario"], 
						   		 'password'=>$_POST["contraseña"],
						   		 'sector'=>$_POST["sector"],
								 'permiso'=>"2");

				$respuesta = Datos::editarModel($datosC, "usuario");

				if($respuesta=="success"){
					$respuesta = Datos::editarcasaModel($datosC, "casa");
					if($respuesta=="success"){
						header("location:index.php?action=modificar");
					}else{
					echo "<p>casa Error</p>";
					}
				}else{
					echo "<p>usuario Error</p>";
				}
			}else if (isset($_POST["boton"])){
				echo "<p>Error</p>";
			}
		}

		public function gasController(){

			$datosC= $_GET["id"];
			$respuesta = Datos::mostrargasModel($datosC, "gas");
			$i=0;
			while ($i < count($respuesta)){ 
				echo "
								<tr>
									<td>".$respuesta [$i][1]."</td>
									<td>".$respuesta [$i][2]."</td>
									<td>".$respuesta [$i][3]."</td>
									<td>
										<a href='index.php?action=editargas&id=".$respuesta [$i][0]."&tipo=".$respuesta [$i][1]."&peso=".$respuesta [$i][2]."&cantidad=".$respuesta [$i][3]."&casa=".$datosC."' title='Editar'>
											<img src='views/css/editar.png' class='icono'>
										</a> | 
										<a href='index.php?action=eliminargas&id=".$respuesta [$i][0]."&tipo=".$respuesta [$i][1]."&peso=".$respuesta [$i][2]."&cantidad=".$respuesta [$i][3]."&casa=".$datosC."' title='Eliminar'>
											<img src='views/css/eliminar.png' class='icono'>
										</a>		
									</td>
								</tr>";
				$i++;
			}
		}

		public function agregargasController(){
			
			if (isset($_POST["tipo"])){
				$datosC = array( 'casa'=>$_POST["id"],
								 'tipo'=>$_POST["tipo"], 
						   		 'peso'=>$_POST["peso"],
						   		 'cantidad'=>$_POST["cantidad"]);

				$respuesta = Datos::gasModel($datosC, "gas", $datosC["cantidad"], $datosC["tipo"], $datosC["peso"]);

				if($respuesta=="success"){
					header("location:index.php?action=modificargas&id=".$datosC["casa"]."");
				}else{
					echo "<p>Error</p>";;
				}
			}else if (isset($_POST["boton"])){
				echo "<p>llena todas las casillas</p>";
			}
		}

		public function editargasController(){
			
			if (isset($_POST["tipo"])){
				$datosC = array( 'id'=>$_POST["id"],
								 'casa'=>$_POST["casa"],
								 'tipo'=>$_POST["tipo"], 
						   		 'peso'=>$_POST["peso"],
						   		 'cantidad'=>$_POST["cantidad"]);

				$respuesta = Datos::editargasModel($datosC, "gas");

				if($respuesta=="success"){
					header("location:index.php?action=modificargas&id=".$datosC["casa"]."");
				}else{
					echo "<p>Error</p>";;
				}
			}else if (isset($_POST["boton"])){
				echo "<p>llena todas las casillas</p>";
			}
		}

		public function jefeController(){

			$datosC= $_GET["id"];
			$respuesta = Datos::mostrarjefeModel($datosC, "grupofamiliar");
			$i=0;
			while ($i < count($respuesta)){ 
				echo "
								<tr>
									<td>".$respuesta [$i][1]."</td>
									<td>".$respuesta [$i][2]."</td>
									<td>".$respuesta [$i][3]."</td>
									<td>".$respuesta [$i][4]."</td>
									<td>
										<a href='index.php?action=editarjefe&id=".$respuesta [$i][0]."&casa=".$datosC."' title='Editar'>
											<img src='views/css/editar.png' class='icono'>
										</a> | 
										<a href='index.php?action=eliminarjefe&id=".$respuesta [$i][0]."&casa=".$datosC."&habitacion=".$respuesta [$i][1]."&ci=".$respuesta [$i][2]."&nombre=".$respuesta [$i][3]."&apellido=".$respuesta [$i][4]."' title='Eliminar'>
											<img src='views/css/eliminar.png' class='icono'>
										</a>		
									</td>
								</tr>";
				$i++;
			}
		}

		public function eliminargasController(){
			
			if (isset($_POST["Si"])){
				$datosC = $_POST["id"];

				$respuesta = Datos::eliminarModel($datosC, "gas");

				if($respuesta=="success"){
					header("location:index.php?action=modificargas&id=".$_GET["casa"]."");
				}else{
					echo "<p>Error</p>";;
				}
			}else if (isset($_POST["No"])){
				header("location:index.php?action=modificargas&id=".$_GET["casa"]."");
			}
		}

		public function verjefeController(){
			
			$id = $_GET["id"];
			
			$respuesta =Datos::verjefeModel($id, "grupofamiliar");

			echo "
			<label>Nombre:</label>
			<br>
			<input type='text' name='Nombre' value='";echo $respuesta[0][5];echo"'required>
			<br>

			<label>Apellido:</label>
			<br>
			<input type='text' name='Apellido' value='";echo $respuesta[0][6];echo"'required>
			<br>

			<label>Fecha de nacimiento:</label>
			<br>
			<input type='date' name='Fecha' value='";echo $respuesta[0][7];echo"'required>
			<br>

			<label>Cedula:</label>
			<br>
			<input type='number' name='Cedula' value='";echo $respuesta[0][3];echo"'required>
			<br>

			<label>Nivel de instruccion:</label>
			<br>
			<input type='text' name='Instruccion' value='";echo $respuesta[0][8];echo"'required>
			<br>

			<label>Estudio:</label>
			<br>
			<input type='text' name='Estudio' value='";echo $respuesta[0][9];echo"'required>
			<br>

			<label>Enfermedad que padece:</label>
			<br>
			<input type='text' name='Enfermedad' value='";echo $respuesta[0][10];echo"'required>
			<br>

			<label>Vacuna (Dosis):</label>
			<br>
			<select name='Vacuna'>
				<option value='1'"; if ($respuesta[0][11] == "1") { echo "selected";} echo">0</option>
				<option value='2'"; if ($respuesta[0][11] == "2") { echo "selected";} echo">1</option>
				<option value='3'"; if ($respuesta[0][11] == "3") { echo "selected";} echo">2</option>
				<option value='4'"; if ($respuesta[0][11] == "4") { echo "selected";} echo">3</option>
			</select>
			<br>

			<label>Estado Civil:</label>
			<br>
			<select name='Civil'>
				<option value='1'"; if ($respuesta[0][12] == "1") { echo "selected";} echo">Soltero/a</option>
				<option value='2'"; if ($respuesta[0][12] == "2") { echo "selected";} echo">Casado/a</option>
				<option value='3'"; if ($respuesta[0][12] == "3") { echo "selected";} echo">Biudo/a</option>
			</select>
			<br>
			
			<label>Numero del Carmet de la Patia:</label>
			<br>
			<input type='number' name='Numero' value='";echo $respuesta[0][13];echo"'required>
			<br>

			<label>Serial del Carmet de la Patia:</label>
			<br>
			<input type='text' name='Serial' value='";echo $respuesta[0][14];echo"'required>
			<br>

			<label>Beneficio Especial de la Plataforma Patria:</label>
			<br>
			<select name='Beneficio'>
				<option value='1'"; if ($respuesta[0][15] == "1") { echo "selected";} echo">Protección Social</option>
				<option value='2'"; if ($respuesta[0][15] == "2") { echo "selected";} echo">Hogares de la Patria</option>
				<option value='3'"; if ($respuesta[0][15] == "3") { echo "selected";} echo">José Gregorio Hernández</option>
				<option value='4'"; if ($respuesta[0][15] == "4") { echo "selected";} echo">Economía Familiar</option>
				<option value='5'"; if ($respuesta[0][15] == "5") { echo "selected";} echo">100% Familia</option>
				<option value='6'"; if ($respuesta[0][15] == "6") { echo "selected";} echo">Parto Humanisado</option>
				<option value='7'"; if ($respuesta[0][15] == "7") { echo "selected";} echo">Lactancia Materna</option>
				<option value='8'"; if ($respuesta[0][15] == "8") { echo "selected";} echo">Ninguno</option>
			</select>
			<br>
			
			<label>Tipo de Condicion Especial:</label>
			<br>
			<select name='Condicion'>
				<option value='1'"; if ($respuesta[0][16] == "1") { echo "selected";} echo">Fìsica</option>
				<option value='2'"; if ($respuesta[0][16] == "2") { echo "selected";} echo">Auditiva</option>
				<option value='3'"; if ($respuesta[0][16] == "3") { echo "selected";} echo">Visual</option>
				<option value='4'"; if ($respuesta[0][16] == "4") { echo "selected";} echo">Intelectual</option>
				<option value='5'"; if ($respuesta[0][16] == "5") { echo "selected";} echo">Mental</option>
				<option value='6'"; if ($respuesta[0][16] == "6") { echo "selected";} echo">Mùltiple</option>
				<option value='7'"; if ($respuesta[0][16] == "7") { echo "selected";} echo">Ninguno</option>
			</select>
			<br>

			<label>tipo de Habitacion:</label>
			<br>
			<select name='Habitacion'>
				<option value='1'"; if ($respuesta[0][2] == "1") { echo "selected";} echo">Propia</option>
				<option value='2'"; if ($respuesta[0][2] == "2") { echo "selected";} echo">Cuido</option>
				<option value='3'"; if ($respuesta[0][2] == "3") { echo "selected";} echo">Alquilada</option>
			</select>
			<br>

			<input type='hidden' name='id' value='";echo $respuesta[0][0];echo"'required>
			<input type='hidden' name='id2' value='";echo $respuesta[0][4];echo"'required>";

		}

		public function editarjefeController(){
			
			if (isset($_POST["Nombre"])) {

				if (isset($_POST["Nombre"])){
					$datosC = array( 	 'nombre'=>$_POST["Nombre"], 
								   		 'apellido'=>$_POST["Apellido"],
								   		 'fecha'=>$_POST["Fecha"],
								   		 'cedula'=>$_POST["Cedula"],
								   		 'instruccion'=>$_POST["Instruccion"],
								   		 'estudio'=>$_POST["Estudio"],
								   		 'enfermedad'=>$_POST["Enfermedad"],
								   		 'vacuna'=>$_POST["Vacuna"],
								   		 'civil'=>$_POST["Civil"],
								   		 'numero'=>$_POST["Numero"],
								   		 'serial'=>$_POST["Serial"],
								   		 'beneficio'=>$_POST["Beneficio"],
								   		 'condicion'=>$_POST["Condicion"],
								   		 'id'=>$_POST["id"],
								   		 'id2'=>$_POST["id2"],
								   		 'habitacion'=>$_POST["Habitacion"],
								   		 'jefe'=>$_POST["Cedula"]);

					$respuesta = Datos::eliminarpersonaModel($datosC["id2"], "persona");
					$respuesta = Datos::editarjefeModel($datosC, "grupofamiliar");
					$respuesta = Datos::personaModel($datosC, "persona");
				}

				if($respuesta=="success"){
					header("location:index.php?action=modificarjefe&id=".$_GET["casa"]."");
				}
			}else if (isset($_POST["boton"])){
				echo "<p>Llene todas las casillas</p>";
			}
		}

		public function eliminarjefeController(){
			
			if (isset($_POST["Si"])){
				$persona = $_POST["ci"];
				$jefe = $_POST["id"];

				$respuesta = Datos::eliminarpersonaModel($persona, "persona");
				$respuesta = Datos::eliminarModel($jefe, "grupofamiliar");

				if($respuesta=="success"){
					header("location:index.php?action=modificarjefe&id=".$_GET["casa"]."");
				}else{
					echo "<p>Error</p>";;
				}
			}else if (isset($_POST["No"])){
				header("location:index.php?action=modificarjefe&id=".$_GET["casa"]."");
			}
		}

		public function peticionesController(){
			
			if (isset($_POST["p1"])){
				$respuesta = Datos::todoModel("persona");
				$i=0;
				$n=0;

				echo "<p><a href='controllers/vacuna.php?docis=".$_POST['docis']."' target='_blan'>Imprimir</a></p>";
				echo "	<table>
									<thead>
										<tr>
											<th>Cedula</th>
											<th>Nombre</th>
											<th>Apellidoo</th>
											<th>Fecha de nacimiento</th>
											<th>Docis</th>
										</tr>
									</thead>
									<tbody>";
				while ($i < count($respuesta)){
					if ($_POST["docis"] == "*") {
						
						$n++;
						echo "			<tr>
											<td>".$respuesta [$i][0]."</td>
											<td>".$respuesta [$i][1]."</td>
											<td>".$respuesta [$i][2]."</td>
											<td>".$respuesta [$i][3]."</td>
											<td>".$respuesta [$i][7]."</td>
										</tr>";
					}else if ($_POST["docis"] == $respuesta[$i][7]) {
						$n++;
						echo "			<tr>
											<td>".$respuesta [$i][0]."</td>
											<td>".$respuesta [$i][1]."</td>
											<td>".$respuesta [$i][2]."</td>
											<td>".$respuesta [$i][3]."</td>
											<td>".$respuesta [$i][7]."</td>
										</tr>";
					}
					$i++;
				}
				echo "
									</tbody>
								</table>";
				echo "<p>Total = ".$n." </p>";
			}else if (isset($_POST["p2"])){
				$respuesta = Datos::todoModel("persona");
				$beneficio = Datos::todoModel("beneficio");
				$i=0;
				$n=0;

				echo "<p><a href='controllers/beneficio.php?odt=".$_POST['beneficio']."' target='_blan'>Imprimir</a></p>";
				echo "	<table>
									<thead>
										<tr>
											<th>Cedula</th>
											<th>Nombre</th>
											<th>Apellidoo</th>
											<th>Fecha de nacimiento</th>
											<th>Beneficio</th>
										</tr>
									</thead>
									<tbody>";

				while ($i < count($respuesta)){
					if ($_POST["beneficio"] == "*") {
						
						$n++;
						echo "			<tr>
											<td>".$respuesta [$i][0]."</td>
											<td>".$respuesta [$i][1]."</td>
											<td>".$respuesta [$i][2]."</td>
											<td>".$respuesta [$i][3]."</td>
											<td>";
												$a=0;
												while ($a < count($beneficio)){
													if($respuesta [$i][11] == $beneficio[$a][0]){
														echo $beneficio[$a][1];
													}													
													$a++;
												}
						echo				"</td>
										</tr>";
					}else if ($_POST["beneficio"] == $respuesta[$i][11]) {
						$n++;
						echo "			<tr>
											<td>".$respuesta [$i][0]."</td>
											<td>".$respuesta [$i][1]."</td>
											<td>".$respuesta [$i][2]."</td>
											<td>".$respuesta [$i][3]."</td>
											<td>";
												$a=0;
												while ($a < count($beneficio)){
													if($respuesta [$i][11] == $beneficio[$a][0]){
														echo $beneficio[$a][1];
													}
													$a++;
												}
						echo				"</td>
										</tr>";
					}
					$i++;
				}
				echo "
									</tbody>
								</table>";	
				echo "<p>Total = ".$n." </p>";
			}else if (isset($_POST["p3"])){
				$respuesta = Datos::todoModel("persona");
				$condicion = Datos::todoModel("condicionespecial");
				$i=0;
				$n=0;
				echo "	<table>
									<thead>
										<tr>
											<th>Cedula</th>
											<th>Nombre</th>
											<th>Apellidoo</th>
											<th>Fecha de nacimiento</th>
											<th>Condicion</th>
										</tr>
									</thead>
									<tbody>";

				while ($i < count($respuesta)){
					if ($_POST["condicion"] == "*") {
						$n++;
				
						echo "			<tr>
											<td>".$respuesta [$i][0]."</td>
											<td>".$respuesta [$i][1]."</td>
											<td>".$respuesta [$i][2]."</td>
											<td>".$respuesta [$i][3]."</td>
											<td>";
												$a=0;
												while ($a < count($condicion)){
													if($respuesta [$i][12] == $condicion[$a][0]){
														echo $condicion[$a][1];
													}													
													$a++;
												}
						echo				"</td>
										</tr>";
					}else if ($_POST["condicion"] == $respuesta[$i][12]) {
						$n++;
						echo "			<tr>
											<td>".$respuesta [$i][0]."</td>
											<td>".$respuesta [$i][1]."</td>
											<td>".$respuesta [$i][2]."</td>
											<td>".$respuesta [$i][3]."</td>
											<td>";
												$a=0;
												while ($a < count($condicion)){
													if($respuesta [$i][12] == $condicion[$a][0]){
														echo $condicion[$a][1];
													}
													$a++;
												}
						echo				"</td>
										</tr>";
					}
					$i++;
				}
				echo "
									</tbody>
								</table>";	
				echo "<p>Total = ".$n." </p>";
			}else if (isset($_POST["p4"])){
				$respuesta = Datos::todoModel("persona");
				$i=0;
				$n=0;

				echo "	<table>
									<thead>
										<tr>
											<th>Cedula</th>
											<th>Nombre</th>
											<th>Apellidoo</th>
											<th>Fecha de nacimiento</th>
											<th>Edad</th>
										</tr>
									</thead>
									<tbody>";
				while ($i < count($respuesta)){
					$edad=MvcController::calculaedad($respuesta [$i][3]);
				 	if ($_POST["edad"] == 1) {
						if ($edad <= 12) {
							echo "			<tr>
											<td>".$respuesta [$i][0]."</td>
											<td>".$respuesta [$i][1]."</td>
											<td>".$respuesta [$i][2]."</td>
											<td>".$respuesta [$i][3]."</td>
											<td>".$edad."</td>
										</tr>";
							$n++;
						}
						
					}else if ($_POST["edad"] == 2) {
						
						if ($edad >= 15) {
							echo "			<tr>
											<td>".$respuesta [$i][0]."</td>
											<td>".$respuesta [$i][1]."</td>
											<td>".$respuesta [$i][2]."</td>
											<td>".$respuesta [$i][3]."</td>
											<td>".$edad."</td>
										</tr>";
							$n++;
						}
						
					}else if ($_POST["edad"] == 3) {
						if ($edad >= 60) {
							echo "			<tr>
											<td>".$respuesta [$i][0]."</td>
											<td>".$respuesta [$i][1]."</td>
											<td>".$respuesta [$i][2]."</td>
											<td>".$respuesta [$i][3]."</td>
											<td>".$edad."</td>
										</tr>";
							$n++;
						}
						
					}
					$i++;
				}
				echo "
									</tbody>
								</table>";
				echo "<p>Total = ".$n." </p>";
			}else if (isset($_POST["p5"])){
				
				$respuesta = Datos::todoModel("gas");
				$tipo = Datos::todoModel("tipogas");
				$peso = Datos::todoModel("peso");
				$i=0;
				$n=0;
				echo "	<table>
									<thead>
										<tr>
											<th>Casa</th>
											<th>Tipo</th>
											<th>Peso</th>
											<th>Cantidado</th>
										</tr>
									</thead>
									<tbody>";

				while ($i < count($respuesta)){
				
					if ($_POST["tipo"] == $respuesta[$i][2] && $_POST["peso"] == $respuesta[$i][3]) {
						$n+=$respuesta [$i][4];
						echo "			<tr>
											<td>".$respuesta [$i][1]."</td>
											<td>";
												$a=0;
												while ($a < count($tipo)){
													if($respuesta [$i][2] == $tipo[$a][0]){
														echo $tipo[$a][1];
													}
													$a++;
												}
						echo				"</td>
											<td>";
												$a=0;
												while ($a < count($peso)){
													if($respuesta [$i][3] == $peso[$a][0]){
														echo $peso[$a][1];
													}
													$a++;
												}
						echo				"</td>
											<td>".$respuesta [$i][4]."</td>
										</tr>";
					}
					$i++;
				}
				echo "
									</tbody>
								</table>";	
				echo "<p>Total = ".$n." </p>";
			}
		}

		public function calculaedad($fechanacimiento){
		 	list($ano,$mes,$dia) = explode("-",$fechanacimiento);
		 	$ano_diferencia  = date("Y") - $ano;
		 	$mes_diferencia = date("m") - $mes;
		 	$dia_diferencia   = date("d") - $dia;
		 	if ($dia_diferencia < 0 || $mes_diferencia < 0)
		    	$ano_diferencia--;
		  	return $ano_diferencia;
		}

//funciones hechas por luis
		public function vistaPagoController($id, $servicio){
            $listaObcionesPago=Datos::listaOpcionesPago();
			$idCasa=Datos::retornarIdCasaUsuario($id);
			echo "
			<form method='post'>
            <label>Ingrese La referencia</label><input type='number' name='Numero'></input>
            <br><br>
            <label>Ingrese el tipo de pago</label>
            <select name='opcion_pago'> ";
			foreach($listaObcionesPago as $opcion){
				echo "<option value='$opcion[0]'>$opcion[4]</option>";
			}
			echo "</select>";

			if($servicio == 1){
				$mesesSinPagar=Datos::listaMesesAguaSinPagar($idCasa);
				echo " 
				<br><br>
				<label>Ingrese el Mes del recibo del agua</label>
				<select name='registro_agua''>
				";	
				$texto;
				foreach($mesesSinPagar as $registro){
					switch($registro[1]){
						case "1": $texto="Enero";break;
						case "2": $texto="Febrero";break;
						case "3": $texto="Marzo";break;
						case "4": $texto="Abril";break;
						case "5": $texto="Mayo";break;
						case "6": $texto="Junio";break;
						case "7": $texto="Julio";break;
						case "8": $texto="Agosto";break;
						case "9": $texto="Septiembre";break;
						case "10": $texto="Octubre";break;
						case "11": $texto="Noviembre";break;
						case "12": $texto="Diciembre";break;
						default: $texto="error";
					}
					echo "<option value='$registro[0]'>$texto - $registro[3]</option>";
				}
			echo "</select>";
			}
			else if($servicio == 2){
				$bombonas=Datos::listaBombonasCasa($idCasa);
				echo " 
				<br><br>
				<label>Seleccione la bomona de gas </label>
				<select name='registro_gas'>
				";	
				$tipo_gas;
				$peso_gas;

				foreach($bombonas as $registro){
					$tipo_gas=Datos::retornarTipoGas($registro[2]);
					$peso_gas=Datos::retornarPesoGas($registro[3]);
					echo "<option value='$registro[0]'>$tipo_gas - $peso_gas kg</option>";
				}
	
				echo "</select>";
			}
			
			echo "
          
            <br><br>
            <label>Ingrese La Cedula</label><input type='number' name='Cedula'></input>
            <input type='number' name='Servicio' hidden value='$servicio'></input>
            <br><br>
            <br><br>
            <input type='submit' value='guardar' class='letra boton' name='boton'>
            </form>
			";
		
			
		
			if($_POST){
				if($_POST['Numero']!="" && $_POST['Cedula']!="" && $_POST['Servicio']!="")
				{
					$servicio=$_POST['Servicio'];
					/*inicia la funcion*/
					$datosC = array('referencia'=>$_POST["Numero"], 
						   		 'captura'=>"nulo",
						   		 'cedula'=>$_POST["Cedula"],
						   		 'opcion_pago'=>$_POST["opcion_pago"]);


			Datos::ingresarPago($datosC);
			//se realizo el pago
			
			//
			if($servicio == 1){

				$idPago=Datos::retornarUltimoIdPago();
				$idAgua=$_POST["registro_agua"];
				Datos::ingresarPagoAgua($idAgua, $idPago);
				header("location:index.php?action=agua_usuario");
			}
			else if($servicio == 2){
				$idPago=Datos::retornarUltimoIdPago();
				$idGas=$_POST["registro_gas"];
				Datos::ingresarHistorialGas($idPago, $idCasa, $idGas);
				header("location:index.php?action=gas_usuario");
			}
			else if($servicio == 3){
				$idPago=Datos::retornarUltimoIdPago();
				Datos::ingresarHistorialClap($idPago, $idCasa);
				
				header("location:index.php?action=clap_usuario");
			}

			
		
			
				}else if (isset($_POST["boton"])){
					echo "<p>Llene todas las casillas</p>";
				}
			

			}
        }

		public function vistausuarioController($id){
		 	
		 		$respuesta = Datos::todoModel("usuario");
		 		$a=0;
		 		echo "<h1>Usuario</h1><div class='linea'></div>";

				while ($a < count($respuesta)){
					if($respuesta [$a][0] == $id){
						echo "<h2>Usuario: </h2><h3> ".$respuesta [$a][1]."</h3>";
						echo "<h2>Contraseña: </h2><h3> ".$respuesta [$a][2]."</h3>";
						echo "<h2>Sector: </h2><h3> ".$respuesta [$a][4]."</h3>";
						$idUsuario = $respuesta [$a][0];
						$a+=999999;
					}
					$a++;
				}
				echo "<h1>Casa</h1><div class='linea'></div>";

				$respuesta = Datos::todoModel("casa");
		 		$a=0;
				while ($a < count($respuesta)){
					if($respuesta [$a][1] == $idUsuario){
						echo "<h2>Telefono: </h2><h3> ".$respuesta [$a][4]."</h3>";
						echo "<h2>Casa: </h2><h3> ".$respuesta [$a][0]."</h3>";
						echo "<h2>Calle: </h2><h3> ".$respuesta [$a][2]."</h3>";
						$idCasa = $respuesta [$a][0];
						$idLado = $respuesta [$a][3];
						$a+=999999;
					}
					$a++;
				}
				$respuesta = Datos::todoModel("lado");
		 		$a=0;
				while ($a < count($respuesta)){
					if($respuesta [$a][0] == $idLado){
						echo "<h2>Lado: </h2><h3> ".$respuesta [$a][1]."</h3>";
						$a+=999999;
					}
					$a++;
				}

				echo "<h1>Gas</h1><div class='linea'></div>";
				$respuesta = Datos::todoModel("gas");
				$tipo = Datos::todoModel("tipogas");
				$peso = Datos::todoModel("peso");
		 		$a=0;
				while ($a < count($respuesta)){
					if($respuesta [$a][1] == $idCasa){
						$b=0;
						while ($b < count($tipo)){
							if($respuesta [$a][2] == $tipo[$b][0]){
								echo "<h2>Tipo Cilindro del gas: </h2><h3> ".$tipo[$b][1]."</h3>";
								$b=999999;
							}	
							$b++;
						}
						$b=0;
						while ($b < count($peso)){
							if($respuesta [$a][2] == $peso[$b][0]){
								echo "<h2>Peso Cilindro del gas: </h2><h3> ".$peso[$b][1]."</h3>";
								$b=999999;
							}	
							$b++;
						}
						echo "<h2>Cantidado: </h2><h3> ".$respuesta [$a][4]."</h3>";
					}
					$a++;
				}
				echo "<h1>Familias</h1><div class='linea'></div>";

				$respuesta = Datos::todoModel("grupofamiliar");
				$vacuna = Datos::todoModel("vacuna");
				$estadocivil = Datos::todoModel("estadocivil");
				$beneficio = Datos::todoModel("beneficio");
				$condicionespecial = Datos::todoModel("condicionespecial");
				$persona = Datos::todoModel("persona");
				 $a=0;
				 $N=1;
				while ($a < count($respuesta)){
					if($respuesta [$a][1] == $idCasa){
						echo "<h1>".$N."</h1>";

						$N++;
						echo "<h2>Tipo de Habitacion: </h2><h3> ".$respuesta [$a][2]."</h3>";
						$i=0;
						while ($i < count($persona)){
							if($persona [$i][13] == $respuesta [$a][3]){
								echo "<h2>Cedual: </h2><h3> ".$persona [$i][0]."</h3>";
								echo "<h2>Nombrel: </h2><h3> ".$persona [$i][1]."</h3>";
								echo "<h2>Apellido: </h2><h3> ".$persona [$i][2]."</h3>";
								echo "<h2>Fecha de Nacimiento: </h2><h3> ".$persona [$i][3]."</h3>";
								echo "<h2>Nivel de Instruccion: </h2><h3> ".$persona [$i][4]."</h3>";
								echo "<h2>Estudio: </h2><h3> ".$persona [$i][5]."</h3>";
								echo "<h2>Enfermedad: </h2><h3> ".$persona [$i][6]."</h3>";
								echo "<h2>Numero del Carnet de la Patria: </h2><h3> ".$persona [$i][9]."</h3>";
								echo "<h2>Serial del Carnet de la Patria: </h2><h3> ".$persona [$i][10]."</h3>";
								$b=0;
								while ($b < count($vacuna)){
									if($persona [$i][7] == $vacuna[$b][0]){
										echo "<h2>Docis de la vacuna(Covid-19): </h2><h3> ".$vacuna[$b][1]."</h3>";
										$b=999999;
									}	
									$b++;
								}
								$b=0;
								while ($b < count($estadocivil)){
									if($persona [$i][8] == $estadocivil[$b][0]){
										echo "<h2>Estado Civil: </h2><h3> ".$estadocivil[$b][1]."</h3>";
										$b=999999;
									}	
									$b++;
								}
								$b=0;
								while ($b < count($beneficio)){
									if($persona [$i][11] == $beneficio[$b][0]){
										echo "<h2>Beneficio Especial de la plataforma Patria: </h2><h3> ".$beneficio[$b][1]."</h3>";
										$b=999999;
									}	
									$b++;
								}$b=0;
								while ($b < count($condicionespecial)){
									if($persona [$i][8] == $condicionespecial[$b][0]){
										echo "<h2>Condicion: </h2><h3> ".$condicionespecial[$b][1]."</h3>";
										$b=999999;
									}	
									$b++;
								}
							}
							$i++;
						}		
					}
					$a++;
				}
		 	
		}

		public function vistaAguaUsuario($idUsuario){
			$idCasa=Datos::retornarIdCasaUsuario($idUsuario);
			$dataName="agua";
			$listaRegistros=Datos::rertornarListaRegistrosServicio($idCasa, $dataName);
		
			$estadoPago;
			$mes;

			

			echo "<div class='contenedor_tabla'>
			<table> 
			<thead class='.cabecera2'>
			<tr>
			<td>N Factura</td>
			<td>Mes</td>
			<td>Estado</td>
			<td>Anio</td>
			</tr>
			</thead>
			";



			foreach ($listaRegistros as $registro){
				switch($registro[2]){
					case 3: $estadoPago="Pagado";break;
					case 4: $estadoPago="Sin pagar";break;
					case 6: $estadoPago="Pendiente";break;
				}
				switch($registro[1]){
					case 1: $mes="Enero";break;
					case 2: $mes="Febrero";break;
					case 3: $mes="Marzo";break;
					case 4: $mes="Abril";break;
					case 5: $mes="Mayo";break;
					case 6: $mes="Junio";break;
					case 7: $mes="Julio";break;
					case 8: $mes="Agosto";break;
					case 9: $mes="Septiembre";break;
					case 10: $mes="Obtubre";break;
					case 11: $mes="Noviembre";break;
					case 12: $mes="Diciembre";break;
				}

				echo "<tr>
				<td>$registro[4]</td>
				<td>$mes</td>
				<td>$estadoPago</td>
				<td>$registro[3]</td>
				</tr>
				";

			}
			echo "</table>
			</div>";


		}

		public function vistaGasUsuario($idUsuario){
			$idCasa=Datos::retornarIdCasaUsuario($idUsuario);
			$dataName="historialgas";
			$listaRegistros=Datos::rertornarListaRegistrosServicio($idCasa, $dataName);
		
			$estado;
			$dia;
			$mes;
			$anio;
			$fecha;
			$bombona;
			$tipo;
			$peso;

			echo "<p>Lista de pagos de gas</p>
			<br>
			<div class='contenedor_tabla'>
			<table> 
			<thead class='.cabecera2'>
			<tr>
			<td>N Factura</td>
			<td>Estado</td>
			<td>Fecha</td>
			<td>Bombona</td>
			</tr>
			</thead>
			";



			foreach ($listaRegistros as $registro){
				$idGas=$registro[3];
				
				$registroGas=Datos::verificarFacturaIdRegistro($registro[0], "ventagas");
				$bombona = Datos::retornarRegistroUnico("gas", "id", $idGas);
				
					$tipo =Datos::retornarTipoGas($bombona[2]);
					$peso =Datos::retornarPesoGas($bombona[3]);

				if($registroGas!="error"){
					switch($registroGas[1]){
						case 1: $estado="Entregado";break;
						case 2: $estado="Sin Entregar";break;
						case 5: $estado="Denegado";break;
					}
					$fecha=new dateTime($registroGas[2]);
					$fecha= $fecha->format('d/m/Y');
				}
				else{
					$estado = "Sin revisar";
					$fecha ="----";
				}

				echo "<tr>
				<td>$registro[0]</td>
				<td>$estado</td>
				<td>$fecha</td>
				<td>$tipo $peso Kg</td>
				</tr>
				";

			}
			echo "</table>
			</div>";

		

		}

		public function vistaClapUsuario($idUsuario){
			$idCasa=Datos::retornarIdCasaUsuario($idUsuario);
			$dataName="historialclap";
			$listaRegistros=Datos::rertornarListaRegistrosServicio($idCasa, $dataName);
		
			$estado;
			$dia;
			$mes;
			$anio;
			$fecha;

			echo "<p>Lista de pagos de clap</p>
			<br>
			<div class='contenedor_tabla'>
			<table> 
			<thead class='.cabecera2'>
			<tr>
			<td>N Factura</td>
			<td>Estado</td>
			<td>Fecha</td>
			</tr>
			</thead>
			";



			foreach ($listaRegistros as $registro){
				$registroClap=Datos::verificarFacturaIdRegistro($registro[0], "clap");

				if($registroClap !="error"){
					switch($registroClap[1]){
						case 1: $estado="Entregado";break;
						case 2: $estado="Sin Entregar";break;
						case 5: $estado="Denegado";break;
				
					}
					$fecha=new dateTime($registroClap[2]);
					$fecha= $fecha->format('d/m/Y');
				}
				else{
					$estado ="Sin revisar";
					$fecha ="----";
				}



			
				switch($registro[1]){
				
				}

				echo "<tr>
				<td>$registro[0]</td>
				<td>$estado</td>
				<td>$fecha</td>
				</tr>
				";

			}
			echo "</table>
			</div>";

		}

		public function stringMes($num){
			$texto;
			switch($num){
				case "1": $texto="Enero";break;
				case "2": $texto="Febrero";break;
				case "3": $texto="Marzo";break;
				case "4": $texto="Abril";break;
				case "5": $texto="Mayo";break;
				case "6": $texto="Junio";break;
				case "7": $texto="Julio";break;
				case "8": $texto="Agosto";break;
				case "9": $texto="Septiembre";break;
				case "10": $texto="Octubre";break;
				case "11": $texto="Noviembre";break;
				case "12": $texto="Diciembre";break;
				default: $texto="error";
			}
	
			return $texto;
		}      

		public function crearRegistrosClap(){
			$fecha=Datos::retornarMesRegistroClap(1);
			$cantidadCasas= Datos::retornarNumeroCasas();
			$mesActual=intval(date("m"));	
			$anioActual=intval(date("Y"));

			$numRegistros=Datos::contadorRegistrosAceptablesClap($mesActual, $anioActual);
	
		
		}

		public function listadoAdministradorAgua(){
		
			if (isset($_POST["opcion"])){
				$datosC = $_POST["opcion"];
				$dataName="agua";
				$fecha;
				$estado;
                $datosC=4;
			
				$i=0;
				
				echo '	
				<form method="post">
					<label>Numero de casa </label> 
					<input type="number" name="nCasa"
					<div id="cajaBoton">
						<input type="submit" value="Filtrar" class="letra boton" name="boton">
					</div>
				</form>	
				';

				if (isset($_POST["nCasa"]) && ($_POST["nCasa"] != "") ){
					
					$numCasa=$_POST["nCasa"];
					$listaAgua = Datos::returnAllDataOneCondicion($dataName, "idCasa", $numCasa);				
				}
				else{
					$listaAgua = Datos::returnAllData($dataName);
				}
				
				echo "	<div class='contenedor_tabla'>
				<table class='lista_agua'>
							<thead class='.cabecera2'>
								<tr>
									<td>N factura</td>
									<td>Estado</td>
									<td>N Casa</td>
									<td>Fecha</td>
									
									<td>
										
									
										</a>
									</td>
								</tr>
							</thead>
							<tbody>";

							foreach ($listaAgua as $registro){
								$mesAux=Datos::retornarMes($registro[1]);
								$fecha=$mesAux."/".$registro[3];
								$estado=Datos::retornarEstadoFactura($registro[2]);
								$nFactura=$registro[4];

								if($registro[4] =="0"){
									$nFactura="----";
								}
								echo "
											<tr>
												<td>".$nFactura. "</td>
												<td>".$estado."</td>
												<td>".$registro[5]."</td>
												<td>".$fecha."</td>
									";

								if($nFactura != "----"){
									echo "
												<td>
									<a href='index.php?action=modificarFacturaAgua&id=".$registro[4]."' title='Modificar'>
									<img src='views/css/Editar.png' class='icono'>
												";
							}
							else{
								 echo "<td>";
							}
								echo			"</td>
											</tr>";
								 
							}
			
				echo "		</tbody>
						</table>
						</div>";
						
					
			}

		
		}

		

		public function modificarFacturaAgua(){ 
			
			
         $permisoMaster=$_SESSION['master'];

			$id=$_GET["id"];

			if($_POST){
				if($_POST["estado"]){
				
					$estadoAux=$_POST["estado"];
				
					Datos::actualizarEstadoFacturaAgua($id, $estadoAux);

					if($permisoMaster == false)header("location:index.php?action=Agua");
					else header("location:index.php?action=seccionMasterAgua");
				
				}
				else if (isset($_POST["boton"])){
					echo "<p>Seleccione una opcion</p>";
				} 
			}
		
			


         $registroAgua=Datos::retornarRegistroUnico("agua", "idPago", $id);
	     $idPago=$registroAgua[4];
	     $registroPago=Datos::retornarRegistroUnico("pago", "id", $idPago);


			echo "
			<h1>Modificar Factura</h1>
			<h2>Datos del pago</h2>

             <form method='post' >
             <label>Referencia:</label>
			<input type='hidde' name='referencia' value=$registroPago[2] readonly>

			<label>Cedula:</label>


			<input type='text' name='cedula' value=$registroPago[3] readonly>
			<br>
			<label>Estado:</label>
			<br>

			<select name='estado' select=$registroAgua[2] required >
				<option value='0'>Sin Selecionar</option>	
			 	<option value='6'>En espera</option>
				<option value='3'>Pagado</option>
				<option value='5'>Denegado</option>	
			</select>

			<div id='cajaBoton'>
			<input type='submit' value='Editar' class='letra boton' name='boton'>
			</div>
			</form>

				";

		}

		public function modificarFacturaClap(){

			$permisoMaster=$_SESSION['master'];
			$id=$_GET["id"];
			$van=$_GET["van"];
			$registroClap=Datos::retornarRegistroUnico("historialclap", "idPago", $id);

			if($_POST){
				$estadoAux=$_POST["estado"];
		
				if($_POST["idRegistro"] && $van == "0" ){
					Datos::ingresarRegistroClap($registroClap[0], $estadoAux);
					if($permisoMaster == false)header("location:index.php?action=Clap");
					else header("location:index.php?action=seccionMasterClap");
					
				} 
				else if($_POST["estado"] && $van="1"){
					echo $estadoAux;
					Datos::actualizarEstadoFacturaClap($registroClap[0], $estadoAux);
					if($permisoMaster == false)header("location:index.php?action=Clap");
					else header("location:index.php?action=Master");
				}
				else if (isset($_POST["boton"])){
					echo "<p>Seleccione una opcion</p>";
				} 
			}
		
			


       
	     $idPago=$registroClap[2];
	     $registroPago=Datos::retornarRegistroUnico("pago", "id", $idPago);


			echo "
			<h1>Modificar Factura</h1>
			<h2>Datos del pago</h2>

             <form method='post' >
             <label>Referencia:</label>
			<input type='hidde' name='referencia' value=$registroPago[2] readonly>

			<label>Cedula:</label>


			<input type='text' name='cedula' value=$registroPago[3] readonly>
			<br>
			<label>Estado:</label>
			<br>

			<input type='text' name='idRegistro' hidden value=".$registroClap[1].">

			<select name='estado' required >
				<option value='0'>Sin Selecionar</option>	
				<option value='6'>En espera</option>
				<option value='1'>Entregado</option>
				<option value='2'>Sin Entregar</option>	
				<option value='5'>Denegado</option>	
			</select>

			<div id='cajaBoton'>
			<input type='submit' value='Editar' class='letra boton' name='boton'>
			</div>
			</form>

				";

		}

		
		public function modificarFacturaGas(){

			$permisoMaster=$_SESSION['master'];
			$id=$_GET["id"];
			$van=$_GET["van"];
			$registroGas=Datos::retornarRegistroUnico("historialgas", "idPago", $id);

			if($_POST){
				$estadoAux=$_POST["estado"];
				if($_POST["idRegistro"] && $van == "0" ){
					Datos::ingresarRegistroGas($registroGas[0], $estadoAux);
				
					if($permisoMaster == false)header("location:index.php?action=Gas");
					else header("location:index.php?action=seccionMasterGas");
				} 
				else if($_POST["estado"] && $van="1"){
					echo $estadoAux;
					Datos::actualizarEstadoFacturaGas($registroGas[0], $estadoAux);

					if($permisoMaster == false)header("location:index.php?action=Gas");
					else header("location:index.php?action=seccionMasterGas");
				}
				else if (isset($_POST["boton"])){
					echo "<p>Seleccione una opcion</p>";
				} 
			}
		
			


       
	     $idPago=$registroGas[2];
	     $registroPago=Datos::retornarRegistroUnico("pago", "id", $idPago);


			echo "
			<h1>Modificar Factura</h1>
			<h2>Datos del pago</h2>

             <form method='post' >
             <label>Referencia:</label>
			<input type='hidde' name='referencia' value=$registroPago[2] readonly>

			<label>Cedula:</label>


			<input type='text' name='cedula' value=$registroPago[3] readonly>
			<br>
			<label>Estado:</label>
			<br>

			<input type='text' name='idRegistro' hidden value=".$registroGas[1].">

			<select name='estado' required >
				<option value='0'>Sin Selecionar</option>	
				<option value='6'>En espera</option>
				<option value='1'>Entregado</option>
				<option value='2'>Sin Entregar</option>	
				<option value='5'>Denegado</option>	
			</select>

			<div id='cajaBoton'>
			<input type='submit' value='Editar' class='letra boton' name='boton'>
			</div>
			</form>

				";

		}


		public function facturacionAgua(){
		
			$id=$_SESSION['id'];

			
			$mesNum =date("m");
			$mes= Datos::retornarMes($mesNum);
		    $anio=date("Y");


			
			if($_POST){


				$lista_casas=Datos::retornarListaIdCasas();

				foreach($lista_casas as $registro){
					if(Datos::verificarFacturaAguaExiste($registro[0], $mesNum, $anio)!=true){
						Datos::crearRegistroAgua($registro[0], $mesNum, $anio);
					}
					
				}
				
			}
		
			



			echo "
			<h1>Generar facturas de agua</h1>
		

             <form method='post'>
             <label>Mes: </label>
			<input type='hidde' name='mes' value=$mes readonly>

			<div id='cajaBoton'>
			<input type='submit' value='Generar facturas' class='letra boton' name='boton'>
			</div>
			</form>

				";
		}

		public function ListadoAdministradorClap(){
			if (isset($_POST["opcion"])){
				$datosC = $_POST["opcion"];
				$dataName="historialclap";
				$fecha;
				$estado;
				
				$vandera;


				echo '	
				<form method="post">
					<label>Numero de casa </label> 
					<input type="number" name="nCasa"
					<div id="cajaBoton">
						<input type="submit" value="Filtrar" class="letra boton" name="boton">
					</div>
				</form>	
				';

				if (isset($_POST["nCasa"]) && ($_POST["nCasa"] != "") ){
					
					$numCasa=$_POST["nCasa"];
					$listaClap = Datos::returnAllDataOneCondicion($dataName, "idCasa", $numCasa);				
				}
				else{
					$listaClap = Datos::returnAllData($dataName);
				}
				
				
				echo "	<div class='contenedor_tabla'>
				<table class='lista_clap'>
							<thead class='.cabecera2'>
								<tr>
									<td>N factura</td>
									<td>N Casa</td>
									<td>Estado</td>
									<td>Fecha de entrega</td>
									
									<td>
										
									
										</a>
									</td>
								</tr>
							</thead>
							<tbody>";

							foreach ($listaClap as $registro){

								$facturaEntregaClap=Datos::retornarRegistroUnico("clap", "idRegistro",  $registro[0]);
								

								if($facturaEntregaClap != "error"){
									$dt = new DateTime($facturaEntregaClap[2]);
									$fecha = $dt->format('m/Y'); 
									$estado = Datos::retornarEstadoFactura($facturaEntregaClap[1]);
									$vandera= "1";
								}
								else {
									$fecha ="----------";
									$estado ="Sin revisar";
									$vandera="0";
								}

						
								echo "
											<tr>
												<td>".$registro[2]."</td>
												<td>".$registro[1]."</td>
												<td>".$estado."</td>
												<td>".$fecha."</td>
												<td>
									<a href='index.php?action=modificarFacturaClap&id=".$registro[2]."&van=".$vandera."' title='Modificar'>
									<img src='views/css/Editar.png' class='icono'>";
												
							
								echo			"</td>
											</tr>";
								 
							}
			
				echo "		</tbody>
						</table>
						</div>";
						
					
			}
		}

		public function ListadoAdministradorGas(){
			if (isset($_POST["opcion"])){
				$datosC = $_POST["opcion"];
				$dataName="historialgas";
				$fecha;
				$estado;
				
				$vandera;

				
				echo '	
				<form method="post">
					<label>Numero de casa </label> 
					<input type="number" name="nCasa"
					<div id="cajaBoton">
						<input type="submit" value="Filtrar" class="letra boton" name="boton">
					</div>
				</form>	
				';

				if (isset($_POST["nCasa"]) && ($_POST["nCasa"] != "") ){
					
					$numCasa=$_POST["nCasa"];
					$listaGas = Datos::returnAllDataOneCondicion($dataName, "idCasa", $numCasa);				
				}
				else{
					$listaGas = Datos::returnAllData($dataName);
				}
				
				echo "	<div class='contenedor_tabla'>
				<table class='lista_clap'>
							<thead class='.cabecera2'>
								<tr>
									<td>N factura</td>
									<td>N Casa</td>
									<td>Bombona</td>
									<td>Estado</td>
									<td>Fecha de entrega</td>
									
									<td>
										
									
										</a>
									</td>
								</tr>
							</thead>
							<tbody>";

							foreach ($listaGas as $registro){
								$idGas=$registro[3];
								$facturaEntregaGas=Datos::retornarRegistroUnico("ventaGas", "idRegistro",  $registro[0]);
								$bombona = Datos::retornarRegistroUnico("gas", "id", $idGas);
					            $tipo =Datos::retornarTipoGas($bombona[2]);
								$peso =Datos::retornarPesoGas($bombona[3]);

								if($facturaEntregaGas != "error"){
									$dt = new DateTime($facturaEntregaGas[2]);
									$fecha = $dt->format('m/Y'); 
									$estado = Datos::retornarEstadoFactura($facturaEntregaGas[1]);
									$vandera= "1";
								}
								else {
									$fecha ="----------";
									$estado ="Sin revisar";
									$vandera="0";
								}

						
								echo "
											<tr>
												<td>".$registro[2]."</td>
												<td>".$registro[1]."</td>
												<td>".$estado."</td>
												<td>".$tipo." ".$peso."kg</td>
												<td>".$fecha."</td>
												<td>
									<a href='index.php?action=modificarFacturaGas&id=".$registro[2]."&van=".$vandera."' title='Modificar'>
									<img src='views/css/Editar.png' class='icono'>";
												
							
								echo			"</td>
											</tr>";
								 
							}
			
				echo "		</tbody>
						</table>
						</div>";
						
					
			}
		}
		//versiones de secciones de servicios del master
	
		public function listadoAdministradorAguaMaster(){
		
			if (isset($_POST["opcion"])){
				$datosC = $_POST["opcion"];
				$dataName="agua";
				$fecha;
				$estado;
                $datosC=4;
				$listaAgua;
				$i=0;
				
				echo '	
				<form method="post">
					<label>Numero de casa </label> 
					<input type="number" name="nCasa"
					<div id="cajaBoton">
						<input type="submit" value="Filtrar" class="letra boton" name="boton">
					</div>
				</form>	
				';

				if (isset($_POST["nCasa"]) && ($_POST["nCasa"] != "") ){
					
					$numCasa=$_POST["nCasa"];
					$listaAgua = Datos::returnAllDataOneCondicion($dataName, "idCasa", $numCasa);				
				}
				else{
					$listaAgua = Datos::returnAllData($dataName);
				}

				
				echo "	<div class='contenedor_tabla'>
				<table class='lista_agua'>
							<thead class='.cabecera2'>
								<tr>
									<td>N factura</td>
									<td>Estado</td>
									<td>N Casa</td>
									<td>Fecha</td>
									
									<td>
										
									
										</a>
									</td>
								</tr>
							</thead>
							<tbody>";

							foreach ($listaAgua as $registro){
								$mesAux=Datos::retornarMes($registro[1]);
								$fecha=$mesAux."/".$registro[3];
								$estado=Datos::retornarEstadoFactura($registro[2]);
								echo "
											<tr>
												<td>".$registro[4]. "</td>
												<td>".$estado."</td>
												<td>".$registro[5]."</td>
												<td>".$fecha."</td>
												<td>
									<a href='index.php?action=modificarFacturaAgua&id=".$registro[4]."' title='Modificar'>
									<img src='views/css/Editar.png' class='icono'>
												";
							
								echo			"</td>
											</tr>";
								 
							}
			
				echo "		</tbody>
						</table>
						</div>";
						
					
			}

		
		}
		
		public function ListadoAdministradorClapMaster(){
			if (isset($_POST["opcion"])){
				$datosC = $_POST["opcion"];
				$dataName="historialclap";
				$fecha;
				$estado;
				
				$vandera;

				
				echo '	
				<form method="post">
					<label>Numero de casa </label> 
					<input type="number" name="nCasa"
					<div id="cajaBoton">
						<input type="submit" value="Filtrar" class="letra boton" name="boton">
					</div>
				</form>	
				';

				if (isset($_POST["nCasa"]) && ($_POST["nCasa"] != "") ){
					
					$numCasa=$_POST["nCasa"];
					$listaClap = Datos::returnAllDataOneCondicion($dataName, "idCasa", $numCasa);				
				}
				else{
					$listaClap = Datos::returnAllData($dataName);
					}
				
				echo "	<div class='contenedor_tabla'>
				<table class='lista_clap'>
							<thead class='.cabecera2'>
								<tr>
									<td>N factura</td>
									<td>N Casa</td>
									<td>Estado</td>
									<td>Fecha de entrega</td>
									
									<td>
										
									
										</a>
									</td>
								</tr>
							</thead>
							<tbody>";

							foreach ($listaClap as $registro){

								$facturaEntregaClap=Datos::retornarRegistroUnico("clap", "idRegistro",  $registro[0]);
								

								if($facturaEntregaClap != "error"){
									$dt = new DateTime($facturaEntregaClap[2]);
									$fecha = $dt->format('m/Y'); 
									$estado = Datos::retornarEstadoFactura($facturaEntregaClap[1]);
									$vandera= "1";
								}
								else {
									$fecha ="----------";
									$estado ="Sin revisar";
									$vandera="0";
								}

						
								echo "
											<tr>
												<td>".$registro[2]."</td>
												<td>".$registro[1]."</td>
												<td>".$estado."</td>
												<td>".$fecha."</td>
												<td>
									<a href='index.php?action=modificarFacturaClap&id=".$registro[2]."&van=".$vandera."' title='Modificar'>
									<img src='views/css/Editar.png' class='icono'>";
												
							
								echo			"</td>
											</tr>";
								 
							}
			
				echo "		</tbody>
						</table>
						</div>";
						
					
			}
		}

		public function ListadoAdministradorGasMaster(){
			if (isset($_POST["opcion"])){
				$datosC = $_POST["opcion"];
				$dataName="historialgas";
				$fecha;
				$estado;
				
				$vandera;

				echo '	
				<form method="post">
					<label>Numero de casa </label> 
					<input type="number" name="nCasa"
					<div id="cajaBoton">
						<input type="submit" value="Filtrar" class="letra boton" name="boton">
					</div>
				</form>	
				';

				if (isset($_POST["nCasa"]) && ($_POST["nCasa"] != "") ){
					
					$numCasa=$_POST["nCasa"];
					$listaGas = Datos::returnAllDataOneCondicion($dataName, "idCasa", $numCasa);				
				}
				else{
					$listaGas = Datos::returnAllData($dataName);
				}

				
				
				echo "	<div class='contenedor_tabla'>
				<table class='lista_clap'>
							<thead class='.cabecera2'>
								<tr>
									<td>N factura</td>
									<td>N Casa</td>
									<td>Bombona</td>
									<td>Estado</td>
									<td>Fecha de entrega</td>
									
									<td>
										
									
										</a>
									</td>
								</tr>
							</thead>
							<tbody>";

							foreach ($listaGas as $registro){
								$idGas=$registro[3];
								$facturaEntregaGas=Datos::retornarRegistroUnico("ventaGas", "idRegistro",  $registro[0]);
								$bombona = Datos::retornarRegistroUnico("gas", "id", $idGas);
					            $tipo =Datos::retornarTipoGas($bombona[2]);
								$peso =Datos::retornarPesoGas($bombona[3]);

								if($facturaEntregaGas != "error"){
									$dt = new DateTime($facturaEntregaGas[2]);
									$fecha = $dt->format('m/Y'); 
									$estado = Datos::retornarEstadoFactura($facturaEntregaGas[1]);
									$vandera= "1";
								}
								else {
									$fecha ="----------";
									$estado ="Sin revisar";
									$vandera="0";
								}

						
								echo "
											<tr>
												<td>".$registro[2]."</td>
												<td>".$registro[1]."</td>
												<td>".$estado."</td>
												<td>".$tipo." ".$peso."kg</td>
												<td>".$fecha."</td>
												<td>
									<a href='index.php?action=modificarFacturaGas&id=".$registro[2]."&van=".$vandera."' title='Modificar'>
									<img src='views/css/Editar.png' class='icono'>";
												
							
								echo			"</td>
											</tr>";
								 
							}
			
				echo "		</tbody>
						</table>
						</div>";
						
					
			}
		}

		public function foroMaster(){
			$permisoMaster=$_SESSION['master'];
			$tipo_noticia=1;
		
		
			if(isset($_POST["titulo"]) && isset($_POST["texto"])){
			
			
				$titulo=$_POST["titulo"];
				$texto=$_POST["texto"];

				if($titulo!="" && $texto!=""){
					
					Datos::publicarNoticia($titulo, $texto, $tipo_noticia);
					echo "<p>Publicacion realizada</p>";
				//	header("location:index.php?action=seccionMasterForo");
				}

				else if (isset($_POST["boton"])){
					echo "<p>Seleccione una opcion</p>";
				} 
			}
			


			echo "
			<h1>Ingresar Publicacion</h1>

             <form method='post' action=>
			 <br>
			<input type='text' name='titulo' placeholder='Ingrese el titulo'>
			<br>

			<label>Noticia:</label>
			<br>
			<textarea  name='texto' rows='20' cols='100'></textarea>
			<br>
			<br>

			<input type='number' value'1' hidden>
			<div id='cajaBoton'>
			<input type='submit' value='Publicar' class='letra boton' name='boton'>
			
			
			</div>
			</form>
			<p><a href='index.php?action=listadoNoticiasMaster&title='Modificar'>Listado de noticias</a></p>
				";
		}

		public function listadoNoticiasMaster(){

			if(isset($_GET["id"])){
				$id=$_GET["id"];
				Datos::priorizarNoticia($id);
			}

			if (isset($_POST["opcion"])){
				$datosC = $_POST["opcion"];
				$dataName="noticias";
				$listaNoticias = Datos::returnAllData($dataName);
				$vandera=true;
				$prioridad;

				echo "	<div class='contenedor_tabla'>
				<table class='lista_clap'>
							<thead class='.cabecera2'>
								<tr>
									<td>N Articulo</td>
									<td>Titulo</td>
									<td>Departamento</td>
									<td> Prioridad</td>
								<td></td>
								<td></td>
								</tr>
							</thead>
							<tbody>";

							foreach ($listaNoticias as $registro){
					
						if($registro[4]=="1") $prioridad="Si";
						else $prioridad="No";
								echo "
											<tr>
												<td>".$registro[0]."</td>
												<td>".$registro[1]."</td>
												<td>".$registro[3]."</td>
												<td>".$prioridad."</td>
												<td>
								  <p><a href='index.php?action=listadoNoticiasMaster&id=".$registro[0]."&departamento=".$registro[3]."'>Priorizar</a></p>
												<td>
								  <p><a href='index.php?action=modificarNoticia&id=".$registro[0]."' title='Modificar'>Editar</a></p>
												</td>
									";
									
								echo			"</td>
											</tr>";
								 
							}
			
				echo "		</tbody>
						</table>
						</div>";
						
					
			}
		}

		public function modificarNoticia(){

			$permisoMaster=$_SESSION['master'];
			$direccion=$_SESSION['servicio'];

			switch ($direccion) {
				case "1": $direccion="seccionMasterForo";break;					
				case "2": $direccion="informacion_gas";break;
				case "3": $direccion="informacion_clap";break;			
			}

		
			$id=$_GET["id"];
			
			$registroNoticia=Datos::retornarRegistroUnico("noticias", "id", $id);

			if(isset($_POST["titulo"]) && isset($_POST["texto"])){

				$titulo=$_POST["titulo"];
				$texto=$_POST["texto"];
				$id=$_POST["id"];

				if($titulo!="" && $texto!=""){
				Datos::actualizarNoticia($titulo, $texto, $id);
				header("location:index.php?action=$direccion");
				}

				else if (isset($_POST["boton"])){
					echo "<p>Seleccione una opcion</p>";
				} 
			}
			

       

			echo "
			<h1>Moficar Noticia</h1>

             <form method='post' action=>
			 <br>
			<input type='text' name='titulo' value='".$registroNoticia[1]."'>
			<br>

			<label>Noticia:</label>
			<br>
			<textarea  name='texto' rows='20' cols='100'>$registroNoticia[2]</textarea>
			<br>
			<br>

			<input type='text' name='id' value='".$registroNoticia[0]."'hidden>

			<div id='cajaBoton'>
			<input type='submit' value='Actualizar' class='letra boton' name='boton'>			
			</div>
			</form>
		
				";

			

		}
		
		public function publicarNoticiaServicio(){
			
			$permisoMaster=$_SESSION['master'];
			$tipo_noticia=$_SESSION['servicio'];
			$direccion2;
			if($tipo_noticia == "2")$direccion2="Gas";
			else $direccion2="Clap";
		
		
			if(isset($_POST["titulo"]) && isset($_POST["texto"])){
			
			
				$titulo=$_POST["titulo"];
				$texto=$_POST["texto"];

				if($titulo!="" && $texto!=""){
					
					Datos::publicarNoticia($titulo, $texto, $tipo_noticia);
					echo "<p>Publicacion realizada</p>";
				//	header("location:index.php?action=seccionMasterForo");
				}

				else if (isset($_POST["boton"])){
					echo "<p>Seleccione una opcion</p>";
				} 
			}
			


			echo "
			<h1>Ingresar Publicacion</h1>

             <form method='post' action=>
			 <br>
			<input type='text' name='titulo' placeholder='Ingrese el titulo'>
			<br>

			<label>Noticia:</label>
			<br>
			<textarea  name='texto' rows='20' cols='100'></textarea>
			<br>
			<br>

			<input type='number' value'2' hidden>
			<div id='cajaBoton'>
			<input type='submit' value='Publicar' class='letra boton' name='boton'>
			
			
			</div>
			</form>
			<p><a href='index.php?action=listadoNoticias".$direccion2."&title='Modificar'>Listado de noticias</a></p>
				";
		}

		public function listadoNoticiasServicio(){
             $tipo_noticia= $_SESSION['servicio'];
			 $campo ="departamento"; 
			 $direccion2;

			 if($tipo_noticia == "2")$direccion2="Gas";
			 else $direccion2="Clap";
		 

		
			if(isset($_GET["id"])){
				$id=$_GET["id"];
				Datos::priorizarNoticia($id);
			}

			if (isset($_POST["opcion"])){
				$datosC = $_POST["opcion"];
				$dataName="noticias";
				$listaNoticias = Datos::returnAllDataOneCondicion($dataName, $campo,  $tipo_noticia);
				$vandera=true;
				$prioridad;

				echo "	<div class='contenedor_tabla'>
				<table class='lista_clap'>
							<thead class='.cabecera2'>
								<tr>
									<td>N Articulo</td>
									<td>Titulo</td>
									<td>Departamento</td>
									<td> Prioridad</td>
								<td></td>
								<td></td>
								</tr>
							</thead>
							<tbody>";

							foreach ($listaNoticias as $registro){
					
						if($registro[4]=="1") $prioridad="Si";
						else $prioridad="No";
								echo "
											<tr>
												<td>".$registro[0]."</td>
												<td>".$registro[1]."</td>
												<td>".$registro[3]."</td>
												<td>".$prioridad."</td>
												<td>
								  <p><a href='index.php?action=listadoNoticias".$direccion2."&id=".$registro[0]."&departamento=".$registro[3]."'>Priorizar</a></p>
												<td>
								  <p><a href='index.php?action=modificarNoticia&id=".$registro[0]."' title='Modificar'>Editar</a></p>
												</td>
									";
									
								echo			"</td>
											</tr>";
								 
							}
			
				echo "		</tbody>
						</table>
						</div>";
						
					
			}
		}

		public function seccionCuentasPagos(){
		
			if (isset($_POST["opcion"])){
				$datosC = $_POST["opcion"];
				$dataName="tipopago";
				
				$listaCuentas= Datos::returnAllData($dataName);
				$i=0;
				
				
				
				echo "	<div class='contenedor_tabla'>
				<table class='lista_agua'>
							<thead class='.cabecera2'>
								<tr>
									<td>ID</td>
									<td>Banco</td>
									<td>Numero de telefono</td>
									<td>Cedula</td>
									<td>Tipo de pago</td>
									<td>Sector</td>
									
									<td>
										<a href='index.php?action=agregarCuentaPago&title='agregar'>
										<img src='views/css/mas.png' class='icono'>
										</a>
									</td>
									<td> </td>
								</tr>
							</thead>
							<tbody>";

							foreach ($listaCuentas as $registro){
						$banco =Datos::retornarBanco($registro[1]);
								echo "
											<tr>
												<td>".$registro[0]. "</td>
												<td>".$banco. "</td>
												<td>".$registro[2]. "</td>
												<td>".$registro[3]. "</td>
												<td>".$registro[4]. "</td>
												<td>".$registro[5]. "</td>
												<td>
												<a href='index.php?action=editarCuentaPago&id=".$registro[0]."' title='Modificar'>
												<img src='views/css/Editar.png' class='icono'>
												</td>
									             <td>
												<a href='index.php?action=eliminarCuentaPago&id=".$registro[0]."' title='eliminar'>
												<img src='views/css/eliminar.png' class='icono'>
											</a>
									            </td>
											</tr>
												";
							
								echo	"";
								 
							}
			
				echo "		</tbody>
						</table>
						</div>";
						
					
			}

		
		}

		public function agregarCuentaPago(){
		
			if(isset($_POST["numero"])){
			
			
		

				if($_POST["numero"]!=""){
					$numero=$_POST["numero"];
					$cedula=$_POST["cedula"];
					$banco=$_POST["banco"];
					$tipo=$_POST["tipo"];
					$sector=$_POST["sector"];
					
				Datos::ingresarRegistroCuentaPago($numero, $cedula, $banco, $tipo, $sector);
				
					header("location:index.php?action=seccionCuentasPagos");
				}

				else if (isset($_POST["boton"])){
					echo "<p>Seleccione una opcion</p>";
				} 
			}
			


			echo "
			<h1>Ingresar Publicacion</h1>
             <form method='post' action=>
		
		
			<br>
			<input type='number' name='numero' placeholder='Ingrese el numero de telefono' required>
			<br>
			<br>
			<input type='number' name='cedula' placeholder='Ingrese la cedula' required>
			<br>

			<label>Banco</label>
			<select name='banco' required >
			<option value='0'></option>	
			<option value='1'>100% Banco</option>
			<option value='2'>Bancamiga</option>
			<option value='3'>BanCaribe</option>	
			<option value='4'>Banco Activo</option>
			<option value='5'>Banco Agrícola de Venezuela</option>
			<option value='6'>Banco Bicentenario del Pueblo</option>
			<option value='7'>Banco Caroní</option>	
			<option value='8'>Banco de Venezuela</option>	
			<option value='9'>Banco del Tesoro</option>
			<option value='10'>Banco Exterior</option>
			<option value='11'>Banco Internacional de Desarrollo</option>	
			<option value='12'>Banco Mercantil</option>	
			<option value='13'>Banco Nacional de Crédito BNC</option>	
			<option value='14'>Banco Plaza</option>	
			<option value='15'>Banco Sofitasa</option>
			<option value='16'>Banco Venezolano de Crédito</option>
			<option value='17'>Bancrecer</option>	
			<option value='18'>Banesco</option>
			<option value='19'>BANFANB</option>
			<option value='20'>Bangente</option>
			<option value='21'>Banplus</option>	
			<option value='22'>BBVA Provincial</option>	
			<option value='23'>BFC Banco Fondo Común</option>
			<option value='24'>BOD</option>
			<option value='25'>Citibank Sucursal Venezuela</option>
			<option value='26'>DELSUR</option>	
			<option value='27'>Instituto Municipal de Crédito Popular (IMCP)</option>	
			<option value='28'>Mi Banco</option>	
			</select>

			<br>
			<input type='text' name='tipo' placeholder='Ingrese el tipo de pago' required>
			<br>

	
	
			
			<label>Sector</label>
			<select name='sector' required >
			<option value='0'></option>	
			<option value='1'>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>	
			<option value='4'>4</option>	
			</select>

		
			<div id='cajaBoton'>
			<input type='submit' value='registrar' class='letra boton' name='boton'>
			</div>

			</form>
				";
		}
		public function editarCuentaPago(){
		
		}
		public function eliminarCuentaPago(){
		
		}
		public function vistaForoUsuario(){
        $dataName="noticias";
		
		$noticiaGeneral;
		$noticiaGas;
		$noticiaClap;
		
		$valor=1;
		if(isset($_POST["noticia_anterior_general"])){
			$id=$_POST["id"];
			$noticiaGeneral = Datos::retornarNoticiaAnterior($dataName, $valor, $id);			
		}else{
			$noticiaGeneral = Datos::retornarNoticiaActual($dataName, $valor);
		}
  
		$valor=2;
		if(isset($_POST["noticia_anterior_gas"])){
			$id=$_POST["id_gas"];
			$noticiaGas= Datos::retornarNoticiaAnterior($dataName, $valor, $id);			
		}else{
			$noticiaGas = Datos::retornarNoticiaActual($dataName, $valor);
		}

		  
		$valor=3;
		if(isset($_POST["noticia_anterior_clap"])){
			$id=$_POST["id_clap"];
			$noticiaClap = Datos::retornarNoticiaAnterior($dataName, $valor, $id);			
		}else{
			$noticiaClap= Datos::retornarNoticiaActual($dataName, $valor);
		}

			echo '
			<h1>Foro</h1>

			<div clas="caja_noticia">
			<form method="post">
			
	
			<legends>Seccion General</legends>
			<p>'.$noticiaGeneral[1].'</p>
			<p>'.$noticiaGeneral[2].'</p>
			<br>
			<input type="text" value='.$noticiaGeneral[0].' name="id" hidden>
			<div id="cajaBoton">
			<input type="submit" value="Noticia anterior" class="letra boton" name="noticia_anterior_general">			
			</div>
			<div id="cajaBoton">
			<input type="submit" value="Noticia mas reciente" class="letra boton" name="boton">			
			</div>

			</form>
			</div>

			<div clas="caja_noticia">
			<form method="post">
			
	
			<legends>Seccion Gas</legends>
			<p>'.$noticiaGas[1].'</p>
			<p>'.$noticiaGas[2].'</p>
			<br>
			<input type="text" value='.$noticiaGas[0].' name="id_gas" hidden>
			<div id="cajaBoton">
			<input type="submit" value="Noticia anterior" class="letra boton" name="noticia_anterior_gas">			
			</div>
			<div id="cajaBoton">
			<input type="submit" value="Noticia mas reciente" class="letra boton" name="boton">			
			</div>
			
			</form>
			</div>

			<div clas="caja_noticia">
			<form  method="post">
			
	
			<legends>Seccion Clap</legends>
			<p>'.$noticiaClap[1].'</p>
			<p>'.$noticiaClap[2].'</p>
			<br>
			<input type="text" value='.$noticiaClap[0].' name="id_clap" hidden>

			<div id="cajaBoton">
			<input type="submit" value="Noticia anterior" class="letra boton" name="noticia_anterior_clap">			
			</div>

			<div id="cajaBoton">
			<input type="submit" value="Noticia mas reciente" class="letra boton" name="boton">			
			</div>

			</form>
			</div>
			';

			
		}


//finaliza la clase
	}


?>
