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
						$_GET["action"] == "Usuario"){
						
						$enlaces = $_GET["action"];

					}else if ($_GET["action"] == "agregar" || 
						      $_GET["action"] == "editar" || 
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
					}else{
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