<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Smart Community. T.S.D.</title>
	<link rel="stylesheet" type="text/css" href="views/css/estilos.css?3">
	<link rel="stylesheet" type="text/css" href="views/css/menu.css">
	<link rel="icon" type="img.png" href="views/css/icono.png">
</head>
<body>

	<nav>

		<div id="icono">
			<img src="views/css/icono.png" >
		</div>

		<div id="caja">
		<div id="navegacion">
			<?php  
 				
				if (isset($_GET["action"])) {
					if ($_GET["action"] == "login" ||
						$_GET["action"] == "Master" ||
						$_GET["action"] == "Jefe de Calle" ||
						$_GET["action"] == "Usuario" ||
						$_GET["action"] == "Agua"  ||
						$_GET["action"] == "Clap" ||
						$_GET["action"] == "Gas" 
						){
						
						$enlaces = $_GET["action"];

					}else if ($_GET["action"] == "agregar" || 
						      $_GET["action"] == "editar" ||
							  $_GET["action"] == "seccionMasterAgua" || 
							  $_GET["action"] == "seccionMasterClap" || 
							  $_GET["action"] == "seccionMasterGas" || 
							  $_GET["action"] == "seccionMasterForo" || 
							  $_GET["action"] == "seccionMasterJefesCalle" || 
							  $_GET["action"] == "listadoNoticiasMaster" || 
							  $_GET["action"] == "modificarNoticia" || 
							  $_GET["action"] == "seccionCuentasPagos" || 
							  $_GET["action"] == "agregarCuentaPago" || 
							  $_GET["action"] == "editarCuentaPago" || 
							  $_GET["action"] == "eliminarCuentaPago" || 
						      $_GET["action"] == "eliminar") {
						$enlaces = "Master";
					}else if($_GET["action"] == "familias" || 
						     $_GET["action"] == "modificar" || 
						     $_GET["action"] == "modificarcasa" || 
						     $_GET["action"] == "modificargas" || 
						     $_GET["action"] == "agregargas" || 
						     $_GET["action"] == "eliminargas" || 
						     $_GET["action"] == "editargas" || 
						     $_GET["action"] == "modificarjefe" || 
						     $_GET["action"] == "editarjefe" || 
						     $_GET["action"] == "eliminarjefe" || 
						     $_GET["action"] == "peticiones" ){
						     $enlaces = "Jefe de Calle";
					}else if ($_GET["action"] == "facturacion_agua" ||
					        $_GET["action"] == "modificarFacturaAgua"
					) {
			                 $enlaces = "Agua";
					}else if ($_GET["action"] == "proceso_pago_gas" || 
				        	  $_GET["action"] == "historial_gas" || 
							  $_GET["action"] == "listadoNoticiasGas" ||
							  $_GET["action"] == "modificarNoticiaGas" || 
				          	  $_GET["action"] == "informacion_gas"){
						      $enlaces = "Gas"; 
					}else if ($_GET["action"] == "proceso_pago_clap" || 
					          $_GET["action"] == "modificarFacturaClap" ||  
							  $_GET["action"] == "listadoNoticiasClap" ||
							  $_GET["action"] == "modificarNoticiaClap" || 
							  $_GET["action"] == "historial_clap" || 
					  	      $_GET["action"] == "informacion_clap") {
							  $enlaces = "Clap"; 
				  } else if ($_GET["action"] == "pago_usuario" || 
				 			 $_GET["action"] == "foro_usuario" || 
							$_GET["action"] == "agua_usuario" || 
							$_GET["action"] == "gas_usuario" || 
							$_GET["action"] == "clap_usuario") {
							$enlaces = "Usuario"; 
	                     }                    
					
					else{
						$enlaces = "login";;
					}
				}else{
					$enlaces = "login";
				}

				require_once "modulos/navegacion/".$enlaces."Nav.php";
			?>
		</div>
		</div>
	</nav>
	<section class="contenido">
		<?php  
			
			$mvc = new MvcController();
			$mvc -> enlacesPaginasController();

		?>
	</section>
</body>
</html>