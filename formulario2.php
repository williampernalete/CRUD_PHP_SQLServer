<!DOCTYPE html> 
<?php 
 	include ('conexion_sis.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>mi CRUD de php & sqlserver</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="col-md-8 col-md-offset-2">
		<h1>CRUD de PHP & SQLSERVER</h1>
		<form method="POST" action="formulario2.php">
			<div class="form-group">
				<label>Nombre Usuario:</label>
				<input type="text" name="usuario" class="form-control" placeholder="Nombre de Usuario">
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="text" name="pass" class="form-control" placeholder="escriba su Password">
			</div>
			<div class="form-group">
				<label>Email Usuario:</label>
				<input type="text" name="Email" class="form-control" placeholder="Email del Usuario">
			</div>
			<div class="form-group">
				<input type="submit" name="insert" class="btn btn-warning" value="Grabar">
			</div>
		</form>
	</div>
	<br/><br/><br/>
	<?php
		if (isset($_POST['insert'])){
			$usuario=$_POST['usuario'];
			$pass=$_POST['pass'];
			$Email=$_POST['Email'];

			$insertar = "INSERT INTO  usuarios(usuario, password, email)VALUES('$usuario', '$pass', '$Email')";

			 $Ejecutar = sqlsrv_query($con, $insertar);
			//$ejecutar = sqlsrv_query($con, $insertar);
			if ($Ejecutar){
				echo "<h3> Registro insertado exitosamente </h3> ";
			}

		}
	?>

	<div class="col-md-8 col-md-offset-2">
		<table class="table table-striped ">
			<tr align="Center">
				<td>Codigo</td>
				<td>Usuario</td>
				<td>PAssword</td>
				<td>Email</td>
				<td>Acción</td>
				<td>Acción</td>
			</tr>
			<?php
				$consulta="SELECT * FROM Usuarios";
				$ejecutar= sqlsrv_query($con, $consulta);

				$i=0;
				
				while ($fila = sqlsrv_fetch_array($ejecutar)) {
					$Codigo=$fila['id'];
					$usuario=$fila['usuario'];
					$pass= $fila['password'];
					$email=$fila['email'];
					$i++;
				?>
				<tr align="Center">
					<td><?php echo $Codigo; ?></td>
					<td><?php echo $usuario; ?></td>
					<td><?php echo $pass; ?></td>
					<td><?php echo $email; ?></td>
					<td> <a href="formulario2.php?editar=<?php echo $Codigo; ?>">Editar</a></td>
					<td> <a href="formulario2.php?borrar=<?php echo $Codigo; ?>">Borrar</a></td>
				</tr>

				<?php }?>

		</table>
	</div>

		<?php 
			if (isset($_GET['editar'])){
				include('editar2.php');
				
			}
		?>

		<?php 
			if (isset($_GET['borrar'])){

				$id_Borrar= $_GET['borrar'];

				$delete = "DELETE FROM Usuarios where id='$id_Borrar'";

				$ejecutar=sqlsrv_query($con,$delete);
				if ($ejecutar){
					echo "<script> alert('Id eliminado exitosamente')</script>";
					echo "<script>window.open('formulario2.php', '_self')</script>";
				}

			}?>

</body>
</html>