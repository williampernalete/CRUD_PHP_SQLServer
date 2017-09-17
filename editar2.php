<?php

		
	if (isset($_GET['editar'])){
		$editar_id= $_GET['editar'];

		$Consulta = "SELECT * FROM USUARIOS where id='$editar_id'";

		$ejecutar = sqlsrv_query($con,$Consulta);
	
		$fila = sqlsrv_fetch_array($ejecutar);

echo $Consulta;
		$usuario = $fila['usuario'];
		$password = $fila['password'];
		$email = $fila['email'];
	}

?>

</br>


<div class="col-md-8 col-md-offset-2">
		<form method="POST" action="">
			<div class="form-group">
				<label>Nombre:</label>
				<input type="text" name="nombre" class="form-control" value="<?php echo $usuario; ?>"><br />
			</div>
			<div class="form-group">
				<label>Contraseña:</label>
				<input type="text" name="passw" class="form-control" value="<?php echo $password; ?>"><br />
			</div>
			<div class="form-group">
				<label>Email:</label>
				<input type="text" name="email" class="form-control" value="<?php echo $email; ?>"><br />
			</div>
			<div class="form-group">				
				<input type="submit" name="actualizar" class="btn btn-warning" value="ACTUALIZAR DATOS"><br />
			</div>
		</form>
</div>

<?php
	if(isset($_POST['actualizar'])){
		$actualizar_nombre = $_POST['nombre'];
		$actualizar_passwod = $_POST['passw'];
		$actualizar_email = $_POST['email'];

		$Consulta="UPDATE usuarios SET usuario='$actualizar_nombre', password='$actualizar_passwod', email='$actualizar_email' WHERE ID='$editar_id'";

		$EXEC = sqlsrv_query($con,$Consulta);

		if ($EXEC){
			echo "<script>alert('Datos Actualizados') </script>";
			echo "<script>window.open('formulario2.php','_self')</script>";
		}
	}

?>