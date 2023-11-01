<?php
 session_start();
 $_SESSION['tipo_pago']=3;
 $idUsuario = $_SESSION['id'];

 $ingreso = new MvcController();
 $ingreso ->vistaClapUsuario($idUsuario);
 //$ingreso ->crearRegistrosClap();

?>
<style type="text/css">
	@import "views/css/permisos.css";
</style>



<p><a href="index.php?action=pago_usuario">Realizar pago</a></p>