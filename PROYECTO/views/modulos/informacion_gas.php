<?php  
  session_start();
  $idUsuario = $_SESSION['id'];
  $_SESSION['master']=false;
  $_SESSION['servicio']="2";
  if (isset($idUsuario)){
  
?> 

  


   <?php 
      $_POST["opcion"] =2;
        $ingreso = new MvcController();
        $ingreso ->publicarNoticiaServicio();
    
  ?>






<style type="text/css">
	@import "views/css/permisos.css";
</style>

<?php 

  }else{
    header("location:index.php?action=login");
  }