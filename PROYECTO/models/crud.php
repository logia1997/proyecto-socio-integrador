<?php  

	require_once "conexion.php";

	class Datos extends Conexion{

		public static function ingresoModel($datosmodel, $tabla){

			$stmt = Conexion::conectar()->prepare("SELECT a.id, a.usuario, a.password, b.permiso FROM $tabla a inner join permiso b on a.idPermiso=b.id WHERE usuario = :usuario");

			$stmt-> bindParam(":usuario", $datosmodel["usuario"], PDO::PARAM_STR);
			$stmt -> execute();

			return $stmt -> fetch();
		}

		public static function permisosModel($datosmodel, $tabla){

			$stmt = Conexion::conectar()->prepare("SELECT a.id, a.usuario, a.password, b.permiso FROM $tabla a inner join permiso b on a.idPermiso=b.id ");
			
			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		public static function tipoPermisoModel($datosmodel, $tabla){

			$stmt = Conexion::conectar()->prepare("SELECT permiso FROM $tabla b WHERE b.id = $datosmodel");
			
			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		public static function adminModel($datosmodel, $tabla){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ( usuario, password, idPermiso) VALUES (:usua,:pass,:permi)");

			$stmt-> bindParam(":usua", $datosmodel["usuario"], PDO::PARAM_STR);
			$stmt-> bindParam(":pass", $datosmodel["password"], PDO::PARAM_STR);
			$stmt-> bindParam(":permi", $datosmodel["permiso"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}

		public static function editarModel($datosmodel, $tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario=:usua, password=:pass, idPermiso=:permi WHERE id=:id");

			$stmt-> bindParam(":id", $datosmodel["id"], PDO::PARAM_STR);
			$stmt-> bindParam(":usua", $datosmodel["usuario"], PDO::PARAM_STR);
			$stmt-> bindParam(":pass", $datosmodel["password"], PDO::PARAM_STR);
			$stmt-> bindParam(":permi", $datosmodel["permiso"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}

		public static function eliminarModel($datosmodel, $tabla){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");

			$stmt-> bindParam(":id", $datosmodel, PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}

		public static function usuarioModel($datosmodel, $tabla){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ( usuario, password, idPermiso, IdSector) 
			VALUES (:usua,:pass,:permi,:setr)");
			
			$stmt-> bindParam(":usua", $datosmodel["usuario"], PDO::PARAM_STR);
			$stmt-> bindParam(":pass", $datosmodel["password"], PDO::PARAM_STR);
			$stmt-> bindParam(":permi", $datosmodel["permiso"], PDO::PARAM_STR);
			$stmt-> bindParam(":setr", $datosmodel["sector"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}

		public static function casaModel($datosmodel, $tabla){

				$id = Datos::ingresoModel($datosmodel, "usuario");

				$a = $id["id"];

				$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id, idUsuario, calle, idLado, telefono) VALUES (:casa,$a,:calle,:lado,:tlf)");

				$stmt-> bindParam(":casa", $datosmodel["casa"], PDO::PARAM_STR);
				$stmt-> bindParam(":calle", $datosmodel["calle"], PDO::PARAM_STR);
				$stmt-> bindParam(":lado", $datosmodel["lado"], PDO::PARAM_STR);
				$stmt-> bindParam(":tlf", $datosmodel["tlf"], PDO::PARAM_STR);

				if($stmt->execute()){
					return "success";
				}else{
					return "error";
				}
		}	

		public static function gasModel($datosmodel, $tabla, $cantidad, $tipo, $peso){
				
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ( idCasa, idTipo, idPeso, cantidad) VALUES (:casa,$tipo,$peso,$cantidad)");

			$stmt-> bindParam(":casa", $datosmodel["casa"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}

		public static function familiaModel($datosmodel, $tabla){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ( idCasa, idHabitacion, idJefefamilia) VALUES (:casa,:hab,:ci)");

			$stmt-> bindParam(":casa", $datosmodel["casa"], PDO::PARAM_STR);
			$stmt-> bindParam(":hab", $datosmodel["habitacion"], PDO::PARAM_STR);
			$stmt-> bindParam(":ci", $datosmodel["cedula"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}

		public static function personaModel($datosmodel, $tabla){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (
			 cedula,
			 nombre,
			 apellido,
			 fechaNacimiento,
			 nivelInstrucion,
			 estudia,
			 enfermedad,
			 idVacuna,
			 idEstadoCivil,
			 numeroCarnet,
			 serialCarnet,
			 idBeneficio,
			 idCondicion,
			 ciJefe) 
				VALUES (:ci,
						:nom,
						:ape,
						:fec,
						:niv,
						:stu,
						:enf,
						:vac,
						:est,
						:car,
						:ser,
						:ben,
						:con,
						:jefe)");

			$stmt-> bindParam(":ci", $datosmodel["cedula"], PDO::PARAM_STR);
			$stmt-> bindParam(":nom", $datosmodel["nombre"], PDO::PARAM_STR);
			$stmt-> bindParam(":ape", $datosmodel["apellido"], PDO::PARAM_STR);
			$stmt-> bindParam(":fec", $datosmodel["fecha"], PDO::PARAM_STR);
			$stmt-> bindParam(":niv", $datosmodel["instruccion"], PDO::PARAM_STR);
			$stmt-> bindParam(":stu", $datosmodel["estudio"], PDO::PARAM_STR);
			$stmt-> bindParam(":enf", $datosmodel["enfermedad"], PDO::PARAM_STR);
			$stmt-> bindParam(":vac", $datosmodel["vacuna"], PDO::PARAM_STR);
			$stmt-> bindParam(":est", $datosmodel["civil"], PDO::PARAM_STR);
			$stmt-> bindParam(":car", $datosmodel["numero"], PDO::PARAM_STR);
			$stmt-> bindParam(":ser", $datosmodel["serial"], PDO::PARAM_STR);
			$stmt-> bindParam(":ben", $datosmodel["beneficio"], PDO::PARAM_STR);
			$stmt-> bindParam(":con", $datosmodel["condicion"], PDO::PARAM_STR);
			$stmt-> bindParam(":jefe", $datosmodel["jefe"], PDO::PARAM_STR);
			

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}

		public static function grupoModel($datosmodel, $tabla){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ( cedulaJefe, cedulaPersona) VALUES (:jefe,:ci)");

			$stmt-> bindParam(":jefe", $datosmodel["jefe"], PDO::PARAM_STR);
			$stmt-> bindParam(":ci", $datosmodel["cedula"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}

		

		public static function todoModel($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchall();
		}

		public static function datoscasaModel($id){

			$stmt = Conexion::conectar()->prepare("SELECT c.id, c.calle, c.telefono, c.idLado, u.usuario, u.password, s.sector, c.idUsuario
												   FROM casa c
												   inner join  usuario u  on c.idUsuario=u.id
												   inner join sector s on u.idSector=s.id
												   WHERE c.id = $id");
			$stmt->execute();

			return $stmt -> fetchall();
		}

		public static function editarcasaModel($datosmodel, $tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET calle=:calle, idLado=:lado, telefono=:tlf WHERE id=:id");

			$stmt-> bindParam(":id", $datosmodel["casa"], PDO::PARAM_STR);
			$stmt-> bindParam(":calle", $datosmodel["calle"], PDO::PARAM_STR);
			$stmt-> bindParam(":lado", $datosmodel["lado"], PDO::PARAM_STR);
			$stmt-> bindParam(":tlf", $datosmodel["tlf"], PDO::PARAM_STR);

			if($stmt->execute()){
				$stmt = Conexion::conectar()->prepare("UPDATE usuario SET idSector=:sec WHERE id=:id");

				$stmt-> bindParam(":id", $datosmodel["id"], PDO::PARAM_STR);
				$stmt-> bindParam(":sec", $datosmodel["sector"], PDO::PARAM_STR);
				$stmt->execute();

				return "success";
			}else{
				echo "1";
				return "error";
			}
		}

		public static function mostrargasModel($datosmodel, $tabla){
				
			$stmt = Conexion::conectar()->prepare("SELECT  g.id, t.tipo, p.peso, g.cantidad
												   FROM $tabla g 
												   inner join  tipogas t  on g.idTipo=t.id
												   inner join peso p on g.idPeso=p.id
												   WHERE idCasa=$datosmodel");

			if($stmt->execute()){
				return $stmt -> fetchall();
			}else{
				return "error";
			}
		}

		public static function editargasModel($datosmodel, $tabla){
				
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set idTipo=:tipo, idPeso=:peso, cantidad=:can WHERE idUsuario = id");

			$stmt-> bindParam(":id", $datosmodel["id"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo", $datosmodel["tipo"], PDO::PARAM_STR);
			$stmt-> bindParam(":peso", $datosmodel["peso"], PDO::PARAM_STR);
			$stmt-> bindParam(":can", $datosmodel["cantidad"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}

		public static function mostrarjefeModel($datosmodel, $tabla){
				
			$stmt = Conexion::conectar()->prepare("SELECT  g.id, h.tipo, g.idJefefamilia, p.nombre , p.apellido
												   FROM $tabla g 
												   inner join  habitacion h  on g.idHabitacion=h.id
												   inner join persona p on g.idJefefamilia=p.ciJefe
												   WHERE idCasa=$datosmodel");

			if($stmt->execute()){
				return $stmt -> fetchall();
			}else{
				return "error";
			}
		}

		public static function verjefeModel($datosmodel, $tabla){
				
			$stmt = Conexion::conectar()->prepare("SELECT  *
												   FROM $tabla g 
												   inner join  persona p  on g.idJefefamilia=p.ciJefe
												   WHERE id=$datosmodel");

			if($stmt->execute()){
				return $stmt -> fetchall();
			}else{
				return "error";
			}
		}

		public static function editarjefeModel($datosmodel, $tabla){
				
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set idHabitacion=:hab, idJefefamilia=:jefe WHERE id=:id");

			$stmt-> bindParam(":id", $datosmodel["id"], PDO::PARAM_STR);
			$stmt-> bindParam(":hab", $datosmodel["habitacion"], PDO::PARAM_STR);
			$stmt-> bindParam(":jefe", $datosmodel["jefe"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				echo "1";
				return "error";
			}
		}

		public static function eliminarpersonaModel($datosmodel, $tabla){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE cedula=:id");

			$stmt-> bindParam(":id", $datosmodel, PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}
//funciones añadidas por luis
		public static function listaOpcionesPago(){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM tipopago");

			$stmt -> execute();

			return $stmt -> fetchall();

		}
		public static function retornarIdCasaUsuario($id_user){
			
			$stmt = Conexion::conectar()->prepare("SELECT id  FROM casa WHERE idUsuario = $id_user");
			$stmt -> execute();

			$lista= $stmt -> fetchall();
			return $lista[0][0];
		}
		public static function retornarUltimoIdPago(){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM pago");
			$stmt -> execute();
			$lista= $stmt -> fetchall();
			$ultimoRegistro;
			foreach($lista as $aux){
				$ultimoRegistro=$aux;
			}
			return $ultimoRegistro[0];
		}

		public static function rertornarListaRegistrosServicio($idCasa, $dataName){
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $dataName WHERE idCasa = $idCasa");
			$stmt -> execute();

			$lista= $stmt -> fetchall();
			return $lista;
		}
		

		public static function listaMesesAguaSinPagar($idCasa){

			
		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM agua WHERE (idCasa = $idCasa) AND (idEstado= 2 )");
			$stmt -> execute();

			$lista= $stmt -> fetchall();
		
			return $lista;
		}

		public static function ingresarPago($datosC){

			$captura=$datosC['captura'];
			$referencia=$datosC['referencia'];
			$cedula= $datosC['cedula'];
			$idObcion=$datosC['opcion_pago'];
	

			$consulta="INSERT INTO pago( captura, referencia, cedula, idOpcion)
			VALUES ('$captura', '$referencia', '$cedula', '$idObcion')";
				
			$stmt = Conexion::conectar()->prepare($consulta);	
			$stmt->execute();
		}

		public static function ingresarPagoAgua($idAgua, $idPago){
			    $consulta ="
				UPDATE `agua` SET `idEstado` = '0',`idPago` = '$idPago' WHERE id = $idAgua";
				$stmt = Conexion::conectar()->prepare($consulta);	
				$stmt->execute();
		}

		public static function  actualizarEstadoFacturaAgua($id, $newEstado){
			$consulta="UPDATE agua SET 
			idEstado = $newEstado WHERE idPago = $id";
			$stmt = Conexion::conectar()->prepare($consulta);	
			$stmt->execute();
			  }
		public static function  actualizarEstadoFacturaClap($id, $newEstado){
				$consulta="UPDATE clap SET 
				entregado = $newEstado WHERE idRegistro = $id";
				$stmt = Conexion::conectar()->prepare($consulta);	
				$stmt->execute();
		  }

		  public static function  actualizarEstadoFacturaGas($id, $newEstado){
			$consulta="UPDATE ventagas SET 
			entregado = $newEstado WHERE idRegistro = $id";
			$stmt = Conexion::conectar()->prepare($consulta);	
			$stmt->execute();
	  }
	




		public static function retornarMesRegistroClap($id){
			$stmt = Conexion::conectar()->prepare("SELECT fecha FROM clap WHERE id= $id");
			$stmt -> execute();

			$lista= $stmt -> fetchall();
			$dt = new DateTime($lista[0][0]);
		    $mes= $dt->format('m');
			return $mes;
		}
		public static function retornarNumeroCasas(){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM casa");
			$stmt -> execute();
			$lista= $stmt -> fetchall();
			$numero=count($lista);
			return $numero;
		}
	
		public static function ingresarHistorialClap($idPago, $idCasa){
			$consulta="INSERT INTO historialclap( idcasa, idpago)
		    VALUES ('$idCasa', '$idPago')	";
			$stmt = Conexion::conectar()->prepare($consulta);	
			$stmt->execute();
		}

		public static function listaBombonasCasa($idCasa){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM gas WHERE idCasa = '$idCasa'");
			$stmt -> execute();
			$lista= $stmt -> fetchall();
			return $lista ;
	     }

		 public static function  ingresarHistorialGas($idPago, $idCasa, $idGas){
			$consulta="INSERT INTO historialgas ( idcasa, idpago, idGas)
		    VALUES ('$idCasa', '$idPago', '$idGas')
			";
			$stmt = Conexion::conectar()->prepare($consulta);	
			$stmt->execute();
		}
		public static function verificarFacturaIdRegistro($idHistorial, $dataName){
			$te="nulo";
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $dataName WHERE idRegistro = '$idHistorial'");
			$stmt -> execute();
			$lista= $stmt -> fetchall();
			if($lista==NULL){
				return "error";
			}
			else{
				return $lista[0];
			}

			
		}
		public static function  retornarRegistroUnico($dataName, $campo,  $value){
			$te="nulo";
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $dataName WHERE $campo = '$value'");
			$stmt -> execute();
			$lista= $stmt -> fetchall();
			if($lista==NULL){
				return "error";
			}
			else{
				return $lista[0];
			}

			
		}
		

		public static function  returnAllData($dataName){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $dataName");
			$stmt -> execute();
			$lista= $stmt -> fetchall();
			return $lista ;
		}
		public static function  returnAllDataOneCondicion($dataName, $campo, $valor){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $dataName WHERE $campo = $valor");
			$stmt -> execute();
			$lista= $stmt -> fetchall();
			return $lista ;
		}

		
		public static function  retornarListaIdCasas(){
			$stmt = Conexion::conectar()->prepare("SELECT id FROM casa");
			$stmt -> execute();

			$lista= $stmt -> fetchall();
			return $lista;
		}
		
		public static function  verificarFacturaAguaExiste($idCasa, $mes, $anio){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM agua WHERE (idMes = '$mes') AND (anno = '$anio') AND (idCasa = '$idCasa')");
			$stmt -> execute();
			$lista= $stmt -> fetchall();
			if($lista != NULL){
				return true;
			}
			else{
				return false;
			}


		}

		public static function  crearRegistroAgua($idCasa, $mes, $anio){
			$consulta="INSERT INTO `agua`(idMes, `idEstado`, `anno`, `idPago`, `idCasa`) 
			VALUES ('$mes', 0 ,'$anio', 0 ,'$idCasa')";
			$stmt = Conexion::conectar()->prepare($consulta);	
			$stmt->execute();
		}

		public static function ingresarRegistroClap($idRegistro, $newEstado){
			$consulta="INSERT INTO clap( idRegistro, entregado)
		    VALUES ('$idRegistro', '$newEstado')";
			$stmt = Conexion::conectar()->prepare($consulta);	
			$stmt->execute();
		}

		public static function ingresarRegistroGas($idRegistro, $newEstado){
			$consulta="INSERT INTO ventagas( idRegistro, entregado)
			VALUES ('$idRegistro', '$newEstado')";
			$stmt = Conexion::conectar()->prepare($consulta);	
			$stmt->execute();
		}

		public static function  publicarNoticia($titulo, $texto, $departamento){
			$consulta="UPDATE noticias SET 
			prioridad='2' WHERE departamento = '$departamento'";
		    $stmt2 = Conexion::conectar()->prepare($consulta);	
		 	$stmt2->execute();

			$consulta="INSERT INTO noticias( titulo, texto, departamento, prioridad)
		    VALUES ('$titulo', '$texto', '$departamento', 1)";
		    $stmt = Conexion::conectar()->prepare($consulta);	
		 	$stmt->execute();
		}

		public static function  actualizarNoticia($titulo, $texto, $id){
			$consulta="UPDATE noticias SET 
			titulo='$titulo', texto='$texto' WHERE id = '$id'";
		    $stmt = Conexion::conectar()->prepare($consulta);	
		 	$stmt->execute();
		}

		public static function  priorizarNoticia($id){

			$stmt = Conexion::conectar()->prepare("SELECT departamento FROM noticias WHERE id= $id");
			$stmt -> execute();

			$lista= $stmt -> fetchall();

			$departamento=$lista[0][0];

			$consulta="UPDATE noticias SET 
			prioridad='2'";
		    $stmt2 = Conexion::conectar()->prepare($consulta);	
		 	$stmt2->execute();

			 $consulta="UPDATE noticias SET 
			 prioridad='1' WHERE id = '$id'";
			 $stmt3 = Conexion::conectar()->prepare($consulta);	
			$stmt3->execute();
		}

		public static function ingresarRegistroCuentaPago($numero, $cedula, $banco, $tipo, $sector){
			$consulta="
			INSERT INTO `tipopago`(`banco`, `numero`, `cedula`, `tipo`, `idSector`)
			 VALUES ('$banco','$numero','$cedula','$tipo','$sector')
			";
			$stmt = Conexion::conectar()->prepare($consulta);	
			$stmt->execute();
		}

	
	

		//funciones que luego tendre que poner en otro sitio por que no tienen putas que ver con la base de datos
		public static function  retornarMes($num){
		  $mes;
			switch($num){
			case "1": $mes="Enero";break;
			case "2": $mes="Febrero";break;
			case "3": $mes="Marzo";break;
			case "4": $mes="Abril";break;
			case "5": $mes="Mayo";break;
			case "6": $mes="Junio";break;
			case "7": $mes="Julio";break;
			case "8": $mes="Agosto";break;
			case "9": $mes="Septiembre";break;
			case "10": $mes="Octubre";break;
			case "11": $mes="Noviembre";break;
			case "12": $mes="Diciembre";break;
		  }
		  return $mes;
		}

		public static function  retornarEstadoFactura($num){
			$estado;
			  switch($num){
			  case "0": $estado="Sin procesar";break;
			  case "1": $estado="Entregado";break;
			  case "2": $estado="Sin Entregar";break;
			  case "3": $estado="Pagado";break;
			  case "4": $estado="Sin Pagar";break;
			  case "5": $estado="Denegado";break;
			  case "6": $estado="En espera";break;
			}
			return $estado;
		  }
		  public static function  retornarTipoGas($num){
			$tipo_gas;
			switch($num){
				case "1": $tipo_gas="Bengas";break;
				case "2": $tipo_gas="BarinesaGas";break;
				case "3": $tipo_gas="Cocigas";break;
				default: $tipo_gas="error";
			}
			return $tipo_gas;
		}

		public static function  retornarPesoGas($num){
			$peso_gas;
			switch($num){
				case "1": $peso_gas="10";break;
				case "2": $peso_gas="18";break;
				case "3": $peso_gas="27";break;
				case "4": $peso_gas="43";break;
				default: $peso_gas="error";
			}
			return $peso_gas;
		}

		
		public static function  retornarBanco($num){
			$banco;
			switch($num){
				case "1": $banco= "100% Banco";break;
				case "2": $banco= "Bancamiga";break;
				case "3": $banco= "BanCaribe";break;
				case "4": $banco= "Banco Activo";break;
				case "5": $banco= "Banco Agrícola de Venezuela";break;
				case "6": $banco= "Banco Bicentenario del Pueblo";break;
				case "7": $banco= "Banco Caroní";break;
				case "8": $banco= "Banco de Venezuela";break;
				case "9": $banco= "Banco del Tesoro";break;
				case "10": $banco= "Banco Exterior";break;
				case "11": $banco= "Banco Internacional de Desarrollo";break;
				case "12": $banco= "Banco Mercantil";break;
				case "13": $banco= "Banco Nacional de Crédito BNC";break;
				case "14": $banco= "Banco Plaza";break;
				case "15": $banco= "Banco Sofitasa";break;
				case "16": $banco= "Banco Venezolano de Crédito";break;
				case "17": $banco= "Bancrecer";break;
				case "18": $banco= "Banesco";break;
				case "19": $banco= "BANFANB";break;
				case "20": $banco= "Bangente";break;
				case "21": $banco= "Banplus";break;
				case "22": $banco= "BBVA Provincial";break;
				case "23": $banco= "BFC Banco Fondo Común";break;
				case "24": $banco= "BOD";break;
				case "25": $banco= "Citibank Sucursal Venezuela";break;
				case "26": $banco= "DELSUR";break;
				case "27": $banco= "Instituto Municipal de Crédito Popular (IMCP)";break;
				case "28": $banco= "Mi Banco";break;
			}
			return $banco;
		}


		

		/*public static function editarpersonaModel($datosmodel, $tabla){
				
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set  cedula=:ci, nombre=:nom, apellido=:ape, fechaNacimiento=:fec, nivelInstrucion=:niv, estudia=:stu, enfermedad=:enf, idVacuna=:vac, idEstadoCivil=:est, numeroCarnet=:car, serialCarnet=:ser, idBeneficio=:ben, idCondicion=:con, ciJefe=:jefe WHERE id=:id");

			$stmt-> bindParam(":id", $datosmodel["id2"], PDO::PARAM_STR);
			$stmt-> bindParam(":ci", $datosmodel["cedula"], PDO::PARAM_STR);
			$stmt-> bindParam(":nom", $datosmodel["nombre"], PDO::PARAM_STR);
			$stmt-> bindParam(":ape", $datosmodel["apellido"], PDO::PARAM_STR);
			$stmt-> bindParam(":fec", $datosmodel["fecha"], PDO::PARAM_STR);
			$stmt-> bindParam(":niv", $datosmodel["instruccion"], PDO::PARAM_STR);
			$stmt-> bindParam(":stu", $datosmodel["estudio"], PDO::PARAM_STR);
			$stmt-> bindParam(":enf", $datosmodel["enfermedad"], PDO::PARAM_STR);
			$stmt-> bindParam(":vac", $datosmodel["vacuna"], PDO::PARAM_STR);
			$stmt-> bindParam(":est", $datosmodel["civil"], PDO::PARAM_STR);
			$stmt-> bindParam(":car", $datosmodel["numero"], PDO::PARAM_STR);
			$stmt-> bindParam(":ser", $datosmodel["serial"], PDO::PARAM_STR);
			$stmt-> bindParam(":ben", $datosmodel["beneficio"], PDO::PARAM_STR);
			$stmt-> bindParam(":con", $datosmodel["condicion"], PDO::PARAM_STR);
			$stmt-> bindParam(":jefe", $datosmodel["jefe"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				echo "2";
				return "error";
			}
		}*/
 
	}
?>
