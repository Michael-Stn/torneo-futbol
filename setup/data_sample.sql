-- ZONAS
INSERT INTO zonas (nombre) 
VALUES ('ZONA A'), ('ZONA B'), ('ZONA C'), ('ZONA D');

-- ARBITROS
INSERT INTO arbitros (nombre) 
VALUES ('Francisco La Molina'), ('Juan Bava'), ('Horacio Elizondo'), ('Rodolfo Gonzáles');

-- EQUIPOS
INSERT INTO equipos (id_zona, nombre) VALUES
(1, 'BARRILETES'), (1, 'PELLEGRINI'), (1, 'RUSTICOS'), (1, 'PANZAS NEGRAS'),
(2, 'LOS PRESCRIPTOS'), (2, 'DON RAMON'), (2, 'NO VALE CHUMBAR'), (2, 'CIT'),
(3, 'FISCADOS'), (3, 'AG. 56'), (3, 'ACTITUD CABALLASCA'), (3, 'LOS TERCE'),
(4, 'PALITOS'), (4, 'TODOS PARA UNO'), (4, 'SIPES PARA TODOS'), (4, 'TALLERES');

INSERT INTO jugadores (id_equipo, nombre, numero) VALUES
(1, 'Juan José', 10), (1, 'Carlos Andrés', 9),
(2, 'Luis Esteban', 4), (2, 'Michael Stiven', 8),
(3, 'Nicolas Rodriguez', 10), (3, 'Matias Anderson', 12),
(4, 'Jean Carlos', 20), (5, 'José Prado', 7),
(6, 'Mateo Tobias', 30), (6, 'Felipe López', 10);

INSERT INTO partidos (id_zona, id_arbitro, id_local, id_visitante, nro_fecha, goles_local, goles_visitante, fecha_hora, jugado) VALUES
(1, 4, 1, 2, 3, 1, 0, '2021-11-05 15:30', 1),
(1, 4, 3, 4, 1, 2, 1, '2021-11-01 17:30', 1),
(2, 3, 5, 6, 2, 2, 0, '2021-11-10 15:30', 1),
(2, 3, 7, 8, 3, 2, 2, '2021-11-05 17:30', 1),
(3, 2, 9, 10, 4, 3, 0, '2021-12-01 15:30', 1),
(3, 2, 11, 12, 2, 2, 4, '2021-11-10 15:30', 1),
(4, 1, 13, 14, 3, 2, 0, '2021-11-05 17:30', 1),
(4, 1, 15, 16, 4, 1, 1, '2021-12-01 17:30', 1);

INSERT INTO partidos (id_zona, id_arbitro, id_local, id_visitante, nro_fecha, fecha_hora) VALUES
(1, 4, 1, 2, 1, '2021-12-15 15:30'),
(1, 4, 3, 4, 1, '2021-12-15 17:30'),
(2, 3, 5, 6, 1, '2021-12-15 15:30'),
(2, 3, 7, 8, 1, '2021-12-15 17:30'),
(3, 2, 9, 10, 2, '2021-12-21 15:30'),
(3, 2, 11, 12, 2, '2021-12-21 15:30'),
(4, 1, 13, 14, 2, '2021-12-21 17:30'),
(4, 1, 15, 16, 2, '2021-12-21 17:30');