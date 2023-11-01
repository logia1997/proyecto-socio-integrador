<?php 
 session_start();
 $idUsuario = $_SESSION['id'];
 if (isset($idUsuario)){
    $opcionPago = $_SESSION['tipo_pago'];
   
    $agregar = new MvcController();
    $agregar -> vistaPagoController($idUsuario, $opcionPago);




// 
//if($_SESSION['id']){
    
//}
//switch ($tipo_pago){
//     case 1: echo "Pago del agua";break;
//     case 2: echo "Pago del gas";break;
//     case 3: echo "Pago del clap";break;
//     default: echo "Erro de data";break;
// }
/*
<option value="1">100% Banco</option>
      <option value="2">Bancamiga</option>
      <option value="3">BanCaribe</option>
      <option value="4">Banco Activo</option>
      <option value="5">Banco Agrícola de Venezuela</option>
      <option value="6">Banco Bicentenario del Pueblo</option>
      <option value="7">Banco Caroní</option>
      <option value="8">Banco de Venezuela</option>
      <option value="9">Banco del Tesoro</option>
      <option value="10">Banco Exterior</option>
      <option value="11">Banco Internacional de Desarrollo</option>
      <option value="12">Banco Mercantil</option>
      <option value="13">Banco Nacional de Crédito BNC</option>
      <option value="14">Banco Plaza</option>
      <option value="15">Banco Sofitasa</option>
      <option value="16">Banco Venezolano de Crédito</option>
      <option value="17">Bancrecer</option>
      <option value="18">Banesco</option>
      <option value="19">BANFANB</option>
      <option value="20">Bangente</option>
      <option value="21">Banplus</option>
      <option value="22">BBVA Provincial</option>
      <option value="23">BFC Banco Fondo Común</option>
      <option value="24">BOD</option>
      <option value="25">Citibank Sucursal Venezuela</option>
      <option value="26">DELSUR</option>
      <option value="27">Instituto Municipal de Crédito Popular (IMCP)</option>
      <option value="28">Mi Banco</option> */

?>


<style type="text/css">
	@import "views/css/newadmin.css";
</style>
<?php 

	
  	}else{
    	header("location:index.php?action=login");
  	}
  
?>
