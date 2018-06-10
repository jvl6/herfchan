CREATE DATABASE bd_herfchan;
-- DROP DATABASE bd_herfchan;
USE bd_herfchan;

CREATE TABLE IF NOT EXISTS ip(
	ip VARBINARY(200) UNIQUE PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS board(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(200)
); -- DROP TABLE board;

CREATE TABLE IF NOT EXISTS moderador(
	id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(200),
    fk_board LONG REFERENCES board (id)
); -- DROP TABLE moderador;

CREATE TABLE IF NOT EXISTS ban(
	ip_ban VARBINARY(200) PRIMARY KEY,
    FOREIGN KEY (ip_ban) REFERENCES ip (ip),
    reason VARCHAR(200),
    fk_moderador INT REFERENCES moderador (id)
); -- DROP TABLE ban;

CREATE TABLE IF NOT EXISTS postUser(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(200)
); -- DROP TABLE postUser;

CREATE TABLE IF NOT EXISTS thread(
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200),
    comentario NVARCHAR(200),
    fk_board INT REFERENCES board (id),
    fk_user INT REFERENCES postUser (id)
    -- op VARBINARY(200) REFERENCES ip (ip) PARA DESPUÉS
); -- DROP TABLE thread;

CREATE TABLE IF NOT EXISTS post(
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mensaje VARCHAR(60000),
    fk_thread INT REFERENCES thread (id),
    fk_user INT REFERENCES postUser (id),
    isReply BOOLEAN
); -- DROP TABLE post;

CREATE TABLE IF NOT EXISTS reply(
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fk_post LONG REFERENCES post (id),
    fk_reply LONG REFERENCES post (id)
); -- DROP TABLE reply;

DELIMITER //
CREATE PROCEDURE crearThread (titulo VARCHAR(200), comentario NVARCHAR(200), boardNombre VARCHAR(200), usuario VARCHAR(200))
BEGIN
	DECLARE idUsuario INT;
	DECLARE idBoard INT;
    SET idUsuario = (SELECT id FROM postUser WHERE nombre = usuario);
    SET idBoard = (SELECT id FROM board WHERE nombre = boardNombre);
    
    IF (idUsuario IS NULL) THEN
		INSERT INTO postUser VALUES (NULL, usuario);
        SET idUsuario = (SELECT id FROM postUser WHERE nombre = usuario);
    END IF;
    
    INSERT INTO thread VALUES (NULL, titulo, comentario, idBoard, idUsuario);
END //
DELIMITER ;

/*INSERTS POR DEFECTO*/
INSERT INTO board VALUES (NULL, '/h/');
INSERT INTO postUser VALUES (NULL, 'Herfino');
/*INSERTS POR DEFECTO*/

/* Vista para ver los threads creados */

CREATE VIEW thread_alive AS -- DROP VIEW thread_alive;
SELECT
	th.titulo AS 'Thread',
    th.comentario AS 'Descripcion',
    bo.nombre AS 'Board',
    po.nombre AS 'User'
FROM
	thread th
JOIN board bo ON th.fk_board = bo.id
JOIN postUser po ON th.fk_user = po.id;

SELECT * FROM thread_alive;
SELECT nombre FROM board;

/* Vista para ver posts */

CREATE VIEW posts_alive AS -- DROP VIEW posts_alive;
SELECT
	po.mensaje AS 'Mensaje',
    th.titulo AS 'Thread',
    pu.nombre AS 'User',
    po.isReply AS 'Es Respuesta'
FROM
	post po
JOIN thread th ON po.fk_thread = th.id
JOIN postUser pu ON po.fk_user = pu.id;

SELECT * FROM posts_alive;

/* Vista para ver mods */

CREATE VIEW mods_alive AS -- DROP VIEW posts_alive;
SELECT
	mo.usuario AS 'Usuario',
    bo.nombre AS 'Board'
FROM
	moderador mo
JOIN board bo ON mo.fk_board = bo.id;

SELECT * FROM mods_alive;

/* Vista para ver ban */

CREATE VIEW bans_alive AS -- DROP VIEW bans_alive;
SELECT
	ip.ip AS 'IP Usuario',
	bn.reason AS 'Motivo',
	mo.usuario AS 'Baneado Por'
FROM
	ban bn
JOIN ip ip ON bn.ip_ban = ip.ip
JOIN moderador mo ON bn.fk_moderador = mo.id;

SELECT * FROM bans_alive;