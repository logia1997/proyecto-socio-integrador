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
				$enlacesModel == "Agua" ||
				$enlacesModel == "Clap" ||
				$enlacesModel == "Gas" ||
				$enlacesModel == "facturacion_agua" ||
				$enlacesModel == "modificarFacturaAgua" ||
				$enlacesModel == "proceso_pago_gas" ||
				$enlacesModel == "modificarFacturaGas" ||
				$enlacesModel == "proceso_pago_clap" ||
				$enlacesModel == "modificarFacturaClap" ||
				$enlacesModel == "informacion_clap" ||
				$enlacesModel == "informacion_gas" ||
				$enlacesModel == "historial_clap" ||
				$enlacesModel == "historial_gas" ||
				$enlacesModel == "agua_usuario" ||
				$enlacesModel == "gas_usuario" ||
				$enlacesModel == "clap_usuario" ||
				$enlacesModel == "pago_usuario" ||
				$enlacesModel == "seccionMasterAgua" ||
				$enlacesModel == "seccionMasterClap" ||
				$enlacesModel == "seccionMasterGas" ||
				$enlacesModel == "seccionMasterForo" ||
				$enlacesModel == "listadoNoticiasMaster" ||
				$enlacesModel == "listadoNoticiasClap" ||
				$enlacesModel == "listadoNoticiasGas" ||
				$enlacesModel == "modificarNoticia" ||
				$enlacesModel == "modificarNoticiaGas" ||
				$enlacesModel == "modificarNoticiaClap" ||
				$enlacesModel == "seccionMasterJefesCalle" ||
				$enlacesModel == "seccionCuentasPagos" ||
				$enlacesModel == "foro_usuario" ||
				$enlacesModel == "agregarCuentaPago" ||
				$enlacesModel == "editarCuentaPago" ||
				$enlacesModel == "eliminarCuentaPago" ||
				$enlacesModel == "Usuario"){
				
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