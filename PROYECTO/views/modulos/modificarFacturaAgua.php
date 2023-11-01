
<?php  
session_start();
$idUsuario = $_SESSION['id'];

if (isset($idUsuario)){

    $ingreso = new MvcController();
  $ingreso -> modificarFacturaAgua();

}else{
  header("location:index.php?action=login");
}

?>

<style type="text/css">
  @import "views/css/permisos.css";
</style>
