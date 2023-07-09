<?php  
	session_start();
	$idUsuario = $_SESSION['id'];

	if (isset($idUsuario)){
		$id = $_GET["id"];
?>

<h1>Cilindros de Gas de la Casa <?php echo $id ?>.</h1>

<table>
	<thead>
		<tr>
			<th>Tipo</th>
			<th>Peso</th>
			<th>Cantidad</th>
			<th>
				<a href='index.php?action=agregargas&id=<?php echo $id ?>' title='Agregar'>
					<img src='views/css/mas.png' class='icono'>
				</a>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$agregar = new MvcController();
			$agregar -> gasController();
		?>
	</tbody>
</table>
<style type="text/css">
	@import "views/css/permisos.css";
</style>
<?php 

  	}else{
    	header("location:index.php?action=login");
  	}
  
?>