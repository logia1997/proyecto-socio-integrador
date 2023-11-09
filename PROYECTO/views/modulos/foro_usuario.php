<?php
 session_start();
 $_SESSION['tipo_pago']=1;
 $idUsuario = $_SESSION['id'];

 $ingreso = new MvcController();
 $ingreso ->vistaForoUsuario($idUsuario);

?>
<style type="text/css">
	@import "views/css/permisos.css";
</style>


