<?php  
  session_start();
  $idUsuario = $_SESSION['id'];

  if (isset($idUsuario)){
  
?> 
<form method="post">
<div class="container">
  <label class="option_item">
    <input type="radio" class="radio" name="occion" value="1" checked>
      <div class="option_inner seleccion">
        <div class="tickmark"></div>
        <div class="name">Master</div>
      </div>
  </label>
</div>
  
  <?php 
    if (isset($_POST["submit"])) {
      if ($_POST["occion"] == 1){
        $ingreso = new MvcController();
        $ingreso -> permisosController();
      }
    }
  ?>

<div class="container">
  <label class="option_item">
    <input type="radio" class="radio" name="occion" value="7">
      <div class="option_inner seleccion">
        <div class="tickmark"></div>
        <div class="name">Jefe de Calle</div>
      </div>
  </label>
</div>

   <?php 
    if (isset($_POST["submit"])) {
      if ($_POST["occion"] == 7){
        $ingreso = new MvcController();
        $ingreso -> permisosController();
      }
    }
  ?>

<div class="container">
  <label class="option_item">
    <!--<input type="radio" class="radio" name="occion" value="3">-->
      <div class="option_inner seleccion bloqueado">
        <div class="tickmark"></div>
        <div class="name">Agua</div>
      </div>
  </label>
</div>

   <?php 
    if (isset($_POST["submit"])) {
      if ($_POST["occion"] == 3){
        $ingreso = new MvcController();
        $ingreso -> permisosController();
      }
    }
  ?>

<div class="container">
  <label class="option_item">
    <!--<input type="radio" class="radio" name="occion" value="4">-->
      <div class="option_inner seleccion bloqueado">
        <div class="tickmark"></div>
        <div class="name">Clap</div>
      </div>
  </label>
</div>

   <?php 
    if (isset($_POST["submit"])) {
      if ($_POST["occion"] == 4){
        $ingreso = new MvcController();
        $ingreso -> permisosController();
      }
    }
  ?>

<div class="container">
  <label class="option_item">
    <!--<input type="radio" class="radio" name="occion" value="5">-->
      <div class="option_inner seleccion bloqueado">
        <div class="tickmark"></div>
        <div class="name">Gas</div>
      </div>
  </label>
</div>

   <?php 
    if (isset($_POST["submit"])) {
      if ($_POST["occion"] == 5){
        $ingreso = new MvcController();
        $ingreso -> permisosController();
      }
    }
  ?>

<div class="container">
  <label class="option_item">
    <!--<input type="radio" class="radio" name="occion" value="6">-->
      <div class="option_inner seleccion bloqueado">
        <div class="tickmark"></div>
        <div class="name">Foro</div>
      </div>
  </label>
</div>

   <?php 
    if (isset($_POST["submit"])) {
      if ($_POST["occion"] == 6){
        $ingreso = new MvcController();
        $ingreso -> permisosController();
      }
    }
  ?>

<input type="submit" name="submit" value="Cargar" class="letra boton">
</form>

<style type="text/css">
	@import "views/css/permisos.css";
</style>

<?php 

  }else{
    header("location:index.php?action=login");
  }
  
?>