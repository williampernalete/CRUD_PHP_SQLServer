<?php 
	$serverName = "pwilliam";
	$connectionInfo = array("DataBase"=>"prueba_usuarios","UID"=>"prueba23", "PWD"=>"prueba23*","CharacterSet"=>"UTF-8");
	$con = sqlsrv_connect($serverName,$connectionInfo);	


	if($con){
		echo "conexion exitosa";

	}else{
		echo "falloooooo en la conexion";
	}
?>