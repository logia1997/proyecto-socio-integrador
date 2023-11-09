<?php  

	class Conexion{
		
		public static function conectar(){
			$link = new PDO("mysql:host=localhost;dbname=proyecto","root","");
			/*$link = new PDO("mysql:host=localhost;dbname=id18759788_proyecto","id18759788_root","pxhNPVA83A~l*h~=");*/
			return $link;
		}
	}
?>