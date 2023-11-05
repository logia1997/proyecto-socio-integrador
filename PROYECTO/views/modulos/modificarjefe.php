<?php  
	session_start();
	$idUsuario = $_SESSION['id'];

	if (isset($idUsuario)){
		$id = $_GET["id"];
?>

<h1>Jefes de Familia de la Casa <?php echo $id ?>.</h1>
<table>
	<thead>
		<tr>
			<th>Tipo de Habitacio</th>
			<th>CI del Jefe de familia</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>
				<a href='index.php?action=familias&casa=<?php echo $id ?>&numero=1' title='Agregar'>
					<img src='views/css/mas.png' class='icono'>
				</a>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$agregar = new MvcController();
			$agregar -> jefeController();
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