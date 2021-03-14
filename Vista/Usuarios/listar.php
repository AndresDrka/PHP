<?php
//incluir la conexion de la base de datos
include '../../Modelo/Conexion.php';
$conexion = new conexion();
$conexion = $conexion->conexion();
$sentencia = $conexion->query("SELECT * FROM personas WHERE fecha_eliminacion is null");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<title>Listar de usuarios</title>
</head>
<body>

	<div class="container">
		<center><h3>Usuarios</h3></center>

		<div class="row">
			<div class="col-md-4 form-group">
				<a href="../../index.php" class="btn btn-dark">Regresar al inicio</a>
			</div>

			<div class="col-md-4 form-group">
				<a href="nuevo.php" class="btn btn-success">Nuevo usuario</a>
			</div>
		</div>

		<hr>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Fecha_de_nacimiento</th>
					<th>HobbiesFavoritos</th>
					<th>FechaCreacion</th>
					<th>FechaModificacion</th>
					<th colspan="2">Acciones</th>
				</tr>
			</thead>	
			<tbody>
				<?php foreach ($personas as $dato) { ?>
					<tr>
						<td><?php echo $dato->Nombre ; ?></td>
						<td><?php echo $dato->Apellidos; ?></td>
						<td><?php echo $dato->Fecha_de_nacimiento; ?></td>
						<td><?php echo $dato->HobbiesFavoritos; ?></td>
						<td><?php echo $dato->FechaCreacion; ?></td>
						<td><?php echo $dato->FechaModificacion; ?></td>
						<td><a href="editar.php?id=<?php echo $dato->Id_personas; ?>" class="btn btn-primary">Editar</a></td>
						<td><a href="../../Controlador/UsuarioControlador.php?id=<?php echo $dato->Id_personas; ?>&accion=eliminar" class="btn btn-danger">Eliminar</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>
	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
</body>
</html>