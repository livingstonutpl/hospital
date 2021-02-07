CREATE DATABASE bpersistencia;

USE bpersistencia;

CREATE TABLE tpersistencia (
	id_pruebahospital INT NOT NULL AUTO_INCREMENT,
	cadena VARCHAR(250) NOT NULL, 
PRIMARY KEY (id_pruebahospital)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;