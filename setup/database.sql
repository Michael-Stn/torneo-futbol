CREATE DATABASE db_torneo;
USE db_torneo;

CREATE TABLE zonas (
	id TINYINT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(15) NOT NULL,
    eliminado TINYINT NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);

CREATE TABLE arbitros (
	id TINYINT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    eliminado TINYINT NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);

CREATE TABLE equipos (
	id TINYINT NOT NULL AUTO_INCREMENT,
    id_zona TINYINT NOT NULL,
    nombre VARCHAR(40) NOT NULL,
    eliminado TINYINT NOT NULL DEFAULT 0,
    PRIMARY KEY (id),
    FOREIGN KEY (id_zona) REFERENCES zonas(id)
);

CREATE TABLE jugadores (
	id SMALLINT NOT NULL AUTO_INCREMENT,
    id_equipo TINYINT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    numero TINYINT NOT NULL,
    goles SMALLINT NOT NULL DEFAULT 0,
    eliminado TINYINT NOT NULL DEFAULT 0,
    PRIMARY KEY (id),
    FOREIGN KEY (id_equipo) REFERENCES equipos(id)
);

CREATE TABLE partidos (
	id SMALLINT NOT NULL AUTO_INCREMENT,
    id_zona TINYINT NOT NULL,
    id_arbitro TINYINT NULL,
    id_local TINYINT NOT NULL,
    id_visitante TINYINT NOT NULL,
    nro_fecha TINYINT NOT NULL,
    goles_local TINYINT NOT NULL DEFAULT 0,
    goles_visitante TINYINT NOT NULL DEFAULT 0,
    fecha_hora DATETIME NOT NULL,
    jugado TINYINT NOT NULL DEFAULT 0,
    eliminado TINYINT NOT NULL DEFAULT 0,
    PRIMARY KEY (id),
    FOREIGN KEY (id_zona) REFERENCES zonas(id),
    FOREIGN KEY (id_arbitro) REFERENCES arbitros(id),
    FOREIGN KEY (id_local) REFERENCES equipos(id),
    FOREIGN KEY (id_visitante) REFERENCES equipos(id)
);