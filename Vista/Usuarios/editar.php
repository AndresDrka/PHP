<?php 

include '../../Modelo/Conexion.php'; 

$conexion = new conexion();
$conexion = $conexion->conexion();
$genero = $conexion->query("SELECT * FROM genero;");
$genero = $genero->fetchAll(PDO::FETCH_OBJ);

$personas = $conexion->prepare("SELECT * FROM personas WHERE Id_personas = :Id_personas");
$personas->bindValue(':Id_personas', $_GET['id'], PDO::PARAM_INT);
$personas->execute();
$personas = $personas->fetch(PDO::FETCH_OBJ);

if (!isset($personas->Id_personas)) {
	header('Location: ../../index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<title>Editar usuario</title>
</head>
<body>

	<div class="container">

		<center><h3>Editar usuario</h3></center>

		<div class="row">
			<div class="col-md-4 form-group">
				<a href="listar.php" class="btn btn-dark">Regresar</a>
			</div>
		</div>

		<hr>
		

		<form action="../../Controlador/UsuarioControlador.php" method="POST">
			<input type="hidden" name="accion" value="editar">
			<div class="row">

				<input type="hidden" name="id_usuario" value="<?php echo $personas->Id_personas; ?>">

				<div class="col-md-4 form-group">
					<label>Nombre</label>
					<input type="text" name="nombre" value="<?php echo $personas->Nombre; ?>" class="form-control">
				</div>

				<div class="col-md-4 form-group">
					<label>Apellidos</label>
					<input type="text" name="apellidos" value="<?php echo $personas->Apellidos; ?>" class="form-control">
				</div>

				<div class="col-md-4 form-group">
					<label>Genero</label>
					<select name="genero" class="form-control">
						<option value="">Seleccionar</option>
						<?php foreach ($genero as $key => $value) { ?>
							<option value="<?php echo $value->id_Genero; ?>" <?php echo $selected = $value->id_Genero == $personas->id_Genero ? 'selected' : ''; ?> ><?php echo $value->Genero; ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="col-md-4 form-group">
					<label>Fecha nacimiento</label>
					<input type="date" name="fecha_nacimiento" value="<?php echo $personas->Fecha_de_nacimiento; ?>" class="form-control">
				</div>

				<div class="col-md-4 form-group">
					<label>Hobbies</label>
					<textarea name="hobbies" class="form-control"><?php echo $personas->HobbiesFavoritos; ?></textarea>
				</div>

				<button class="btn btn-success" style="margin-top: 15px;">Editar</button>

			</div>
		</form>


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