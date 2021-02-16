<?php
	
	require_once("../config/Connection.php");
	
	class Persona{
		
		public static function create($cedula_per, $nombre_per, $apellido_per, $email_per, $telefono_per, $direccion_per, $ciudadresi_per, $fechanaci_per, $genero_per, $id_usuario1){
			$sql = "INSERT INTO persona (cedula_per, nombre_per, apellido_per, email_per, telefono_per, direccion_per, ciudadresi_per, fechanaci_per, genero_per, id_usuario1)
			VALUES ('$cedula_per', '$nombre_per', '$apellido_per', '$email_per', '$telefono_per', '$direccion_per', '$ciudadresi_per', '$fechanaci_per', '$genero_per', '$id_usuario1')";
			return Connection::runQuery($sql);
		}
		
		// AGENDAMIENTO ADMINISTRADOR
		public static function read(){
			$sql = "SELECT * FROM persona
			";
			return Connection::runQuery($sql);
		}
		
		// CLIENTE AGENDAMIENTO PARA MOSTRAR SOLO PACIENTES ASOCIADOS A SU CUENTA
		public static function readagendamiento($id_usuario){
			$sql = "SELECT * FROM persona
			WHERE id_usuario1 = $id_usuario
			";
			return Connection::runQuery($sql);
		}
		
		public static function readcliente(){
			$sql = "SELECT * FROM persona
			INNER JOIN PersonaRol on Persona.id_persona = PersonaRol.id_persona1
			WHERE id_rol1 = 2
			";
			return Connection::runQuery($sql);
		}
		
		public static function read3($id_usuario){
			$sql = "SELECT * FROM persona
			WHERE id_usuario1 = $id_usuario
			";
			return Connection::runQuery($sql);
		}
		
		public static function update($id_persona, $cedula_per, $nombre_per, $apellido_per, $email_per, $telefono_per, $direccion_per, $ciudadresi_per, $fechanaci_per, $genero_per, $id_usuario1){
			$sql = "UPDATE persona SET
			cedula_per = '$cedula_per',
			nombre_per = '$nombre_per',
			apellido_per = '$apellido_per',
			email_per = '$email_per',
			telefono_per = '$telefono_per',
			direccion_per = '$direccion_per',
			ciudadresi_per = '$ciudadresi_per',
			fechanaci_per = '$fechanaci_per',
			genero_per = '$genero_per',
			id_usuario1 = '$id_usuario1'
			WHERE id_persona = $id_persona";
			return Connection::runQuery($sql);
		}
		
		public static function delete($id_persona){
		$sql = "DELETE FROM persona WHERE id_persona = $id_persona";
		return Connection::runQuery($sql);
		}
		
		public static function single_row($id_persona){
		$sql = "SELECT * FROM persona WHERE id_persona = '$id_persona'";
		return Connection::rowQuery($sql);
		}
		
		public static function ultimo_id(){
		$sql = "SELECT MAX(id_persona) AS id_persona FROM persona";
		return Connection::rowQuery($sql);
		}
		
		}
		
		?>
				