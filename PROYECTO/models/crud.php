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

		public static function rertornarListaRegistrosAgua($idCasa){
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM agua WHERE idCasa = $idCasa");
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
			$idEstado= $datosC['estado_pago'];

		$consulta="INSERT INTO pago( captura, referencia, cedula, idOpcion, idEstadopago)
		VALUES ('$captura', '$referencia', '$cedula', '$idObcion', '$idEstado')";
			
		$stmt = Conexion::conectar()->prepare($consulta);	
		$stmt->execute();
		}

		public static function actualizarAgua($idAgua, $idPago){
			    $consulta ="
				UPDATE `agua` SET `idEstado` = '3',`idPago` = '$idPago' WHERE id = $idAgua";
				$stmt = Conexion::conectar()->prepare($consulta);	
				$stmt->execute();
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
