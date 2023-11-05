<?php  
  session_start();
  $idUsuario = $_SESSION['id'];

  if (isset($idUsuario)){
  $ingreso = new MvcController();
  $ingreso -> vistausuarioController($idUsuario);
?> 

<style type="text/css">
	@import "views/css/newadmin.css";
</style>

<?php 

  }else{
    header("location:index.php?action=login");
  }
  
?>