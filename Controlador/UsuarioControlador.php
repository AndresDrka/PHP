<?php 

include '../Modelo/UsuarioModel.php';

$usuario = new UsuarioModel();

$accion = "";
if (isset($_POST['accion'])) {
	$accion = $_POST['accion'];
}else if(isset($_GET['accion'])){
	$accion = $_GET['accion'];
}

switch ($accion) {
	case 'nuevo':
	$genero = $_POST['genero'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$fechaNacimiento = $_POST['fecha_nacimiento'];
	$hobbies = $_POST['hobbies'];
	$fecha = date('Y-m-d');

	$nuevo = $usuario->nuevo($genero, $nombre, $apellidos, $fechaNacimiento, $hobbies, $fecha, $fecha);

	header('Location: ../Vista/Usuarios/editar.php?id='.$nuevo);
	break;
	
	case 'editar':
	$id = $_POST['id_usuario'];
	$genero = $_POST['genero'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$fechaNacimiento = $_POST['fecha_nacimiento'];
	$hobbies = $_POST['hobbies'];
	$fecha = date('Y-m-d');

	$editar = $usuario->editar($id, $genero, $nombre, $apellidos, $fechaNacimiento, $hobbies, $fecha);

	header('Location: ../Vista/Usuarios/editar.php?id='.$id);
	break;

	case 'eliminar':
	$id = $_GET['id'];
	$fecha = date('Y-m-d');

	$usuario->eliminar($id, $fecha);

	header('Location: ../Vista/Usuarios/listar.php');
	break;

	default:
	header('Location: ../index.php');
	break;
}