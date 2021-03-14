<?php
class conexion{
	public function conexion(){
		$cnn = "";

		try {
			$cnn = new PDO("mysql:host=localhost;dbname=amis","root","");
		} catch (PDOException $e) {
			die(var_dump('Error la conectar: '. $e->getMessage()));
		}
		
		return $cnn;
	}
}