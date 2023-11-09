<?php  
  session_start();
  $idUsuario = $_SESSION['id'];

  if (isset($idUsuario)){
  
?> 

  


   <?php 
      $_POST["opcion"] =3;
        $ingreso = new MvcController();
        $ingreso ->listadoNoticiasServicio();
    
  ?>






<style type="text/css">
	@import "views/css/permisos.css";
</style>

<?php 

  }else{
    header("location:index.php?action=login");
  }