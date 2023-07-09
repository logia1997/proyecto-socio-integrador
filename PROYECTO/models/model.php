<?php  

	class enlacesPaginas{
		
		public static function enlacespaginasModel($enlacesModel){

			if ($enlacesModel == "login" ||
				$enlacesModel == "Master" ||
				$enlacesModel == "agregar" ||
				$enlacesModel == "editar" ||
				$enlacesModel == "eliminar" ||
				$enlacesModel == "Jefe de Calle" ||
				$enlacesModel == "familias" ||
				$enlacesModel == "modificar" ||
				$enlacesModel == "modificarcasa" ||
				$enlacesModel == "modificargas" ||
				$enlacesModel == "agregargas" ||
				$enlacesModel == "editargas" ||
				$enlacesModel == "eliminargas" ||
				$enlacesModel == "modificarjefe" ||
				$enlacesModel == "editarjefe" ||
				$enlacesModel == "eliminarjefe" ||
				$enlacesModel == "peticiones" ||
				$enlacesModel == "Usuario" ){
				
					$module = "views/modulos/".$enlacesModel.".php";

			}else if($enlacesModel == "fallo"){
				$module = "views/modulos/login.php";
			}else if($enlacesModel == "salir"){

				session_start();
				session_destroy();

				$module = "views/modulos/login.php";
			}else{
				$module = "views/modulos/login.php";
			}

			return $module;
		}
	}
	
?>