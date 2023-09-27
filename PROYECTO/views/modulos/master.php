<?php  
  session_start();
  $idUsuario = $_SESSION['id'];

  if (isset($idUsuario)){
  
?> 

  


   <?php 

      $_POST["occion"] =1;
        $ingreso = new MvcController();
        $ingreso -> permisosController();
    
  ?>




</form>


<style type="text/css">
	@import "views/css/permisos.css";
</style>

<?php 

  }else{
    header("location:index.php?action=login");
  }
  
?>
