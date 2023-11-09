<?php  
  session_start();
  $idUsuario = $_SESSION['id'];
  $_SESSION['master']=false;
  if (isset($idUsuario)){
  
?> 

  


   <?php 

      $_POST["opcion"] =1;
        $ingreso = new MvcController();
        $ingreso -> listadoAdministradorGas();
    
  ?>






<style type="text/css">
	@import "views/css/permisos.css";
</style>

<?php 

  }else{
    header("location:index.php?action=login");
  }
  
?>
