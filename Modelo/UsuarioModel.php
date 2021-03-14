<?php
include 'Conexion.php';

class UsuarioModel{

	public function nuevo($genero, $nombre, $apellidos, $fechaNacimiento, $hobbies, $fechaCreacion, $fechaActualizacion){
		$conexion = new conexion();
		$conexion = $conexion->conexion();

		$nuevo = $conexion->prepare("INSERT INTO personas (id_Genero, Nombre, Apellidos, Fecha_de_nacimiento, HobbiesFavoritos, FechaCreacion, FechaModificacion) VALUES(:genero, :nombre, :apellidos, :fecha_nacimiento, :hobbies, :fecha_creacion, :fecha_actualizacion)");
		$nuevo->bindValue(':genero', $genero, PDO::PARAM_INT);
		$nuevo->bindValue(':nombre', $nombre, PDO::PARAM_STR);
		$nuevo->bindValue(':apellidos', $apellidos, PDO::PARAM_STR);
		$nuevo->bindValue(':fecha_nacimiento', $fechaNacimiento, PDO::PARAM_STR);
		$nuevo->bindValue(':hobbies', $hobbies, PDO::PARAM_STR);
		$nuevo->bindValue(':fecha_creacion', $fechaCreacion, PDO::PARAM_STR);
		$nuevo->bindValue(':fecha_actualizacion', $fechaActualizacion, PDO::PARAM_STR);
		$nuevo->execute();
		$nuevoId = $conexion->lastInsertId();

		return $nuevoId;
	}

	public function editar($id_usuario, $genero, $nombre, $apellidos, $fechaNacimiento, $hobbies, $fechaActualizacion){
		$conexion = new conexion();
		$conexion = $conexion->conexion();

		try {
			$nuevo = $conexion->prepare("UPDATE personas SET id_Genero = :genero, Nombre = :nombre, Apellidos = :apellidos, Fecha_de_nacimiento = :fecha_nacimiento, HobbiesFavoritos = :hobbies, FechaModificacion = :fecha_actualizacion WHERE Id_personas = :id_usuario");
			$nuevo->bindValue(':genero', $genero, PDO::PARAM_INT);
			$nuevo->bindValue(':nombre', $nombre, PDO::PARAM_STR);
			$nuevo->bindValue(':apellidos', $apellidos, PDO::PARAM_STR);
			$nuevo->bindValue(':fecha_nacimiento', $fechaNacimiento, PDO::PARAM_STR);
			$nuevo->bindValue(':hobbies', $hobbies, PDO::PARAM_STR);
			$nuevo->bindValue(':fecha_actualizacion', $fechaActualizacion, PDO::PARAM_STR);
			$nuevo->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
			$nuevo->execute();
		} catch (Exception $e) {
			die(var_dump($e));
		}
		
		return true;
	}

	public function eliminar($id_usuario, $fecha_eliminacion){
		$conexion = new conexion();
		$conexion = $conexion->conexion();

		try {
			$eliminar = $conexion->prepare("UPDATE personas SET fecha_eliminacion = :fecha_eliminacion WHERE Id_personas = :id_usuario");
			$eliminar->bindValue(':fecha_eliminacion', $fecha_eliminacion, PDO::PARAM_STR);
			$eliminar->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
			$eliminar->execute();
		} catch (Exception $e) {
			die(var_dump($e));
		}
		
		return true;
	}
}