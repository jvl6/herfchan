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

/*CREATE TABLE IF NOT EXISTS thread(
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200),
    comentario_fk BIGINT UNSIGNED REFERENCES post (id),
    fk_board INT REFERENCES board (id),
    fk_user INT REFERENCES postUser (id)
    -- op VARBINARY(200) REFERENCES ip (ip) PARA DESPUÉS
); -- DROP TABLE thread;
*/

CREATE TABLE IF NOT EXISTS post(
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mensaje VARCHAR(60000),
    fk_user INT REFERENCES postUser (id),
    fk_board INT REFERENCES board (id),
    imagen VARCHAR(100)
); -- DROP TABLE post;

CREATE TABLE IF NOT EXISTS thread(
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200),
    fk_post BIGINT UNSIGNED REFERENCES post (id)
); -- DROP TABLE thread;

CREATE TABLE IF NOT EXISTS post_thread(
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fk_thread BIGINT UNSIGNED REFERENCES thread (id),
    fk_post BIGINT UNSIGNED REFERENCES post (id)
);

CREATE TABLE IF NOT EXISTS reply(
	id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fk_post LONG REFERENCES post (id),
    fk_reply LONG REFERENCES post (id)
); -- DROP TABLE reply;

DELIMITER //
CREATE PROCEDURE crearThread (usuario VARCHAR(200), titulo VARCHAR(200), comentario VARCHAR(60000), boardNombre VARCHAR(200), imagen VARCHAR(100))
BEGIN
	DECLARE idUsuario INT;
	DECLARE idBoard INT;
    DECLARE idPost INT;
    SET idUsuario = (SELECT id FROM postUser WHERE nombre = usuario);
    SET idBoard = (SELECT id FROM board WHERE nombre = boardNombre);
    
    IF (idUsuario IS NULL) THEN
		INSERT INTO postUser VALUES (NULL, usuario);
        SET idUsuario = (SELECT id FROM postUser WHERE nombre = usuario);
    END IF;
    
    INSERT INTO post VALUES (NULL, comentario, idUsuario, idBoard, imagen);
    
    INSERT INTO thread VALUES (NULL, titulo, LAST_INSERT_ID());
END //
DELIMITER ;
-- DROP PROCEDURE crearThread;

DELIMITER //
CREATE PROCEDURE crearPost (usuario VARCHAR(200), mensaje VARCHAR(200), boardNombre VARCHAR(200), idThread BIGINT UNSIGNED, imagen VARCHAR(100))
BEGIN
	DECLARE idUsuario INT;
	DECLARE idBoard INT;
    DECLARE idPost INT;
    SET idUsuario = (SELECT id FROM postUser WHERE nombre = usuario);
    SET idBoard = (SELECT id FROM board WHERE nombre = boardNombre);
    
    IF (idUsuario IS NULL) THEN
		INSERT INTO postUser VALUES (NULL, usuario);
        SET idUsuario = (SELECT id FROM postUser WHERE nombre = usuario);
    END IF;
    
    INSERT INTO post VALUES (NULL, mensaje, idUsuario, idBoard, imagen);
    SET idPost = LAST_INSERT_ID();
    INSERT INTO post_thread VALUES(NULL, idThread, idPost);
    INSERT INTO reply VALUES(NULL, idPost, idThread);
END //
DELIMITER ;
-- DROP PROCEDURE crearPost;

/*INSERTS POR DEFECTO*/
INSERT INTO board VALUES (NULL, '/h/');
INSERT INTO board VALUES (NULL, '/o/');
INSERT INTO postUser VALUES (NULL, 'Herfino');
/*INSERTS POR DEFECTO*/

SELECT * FROM board;
SELECT * FROM thread;
SELECT * FROM post;

/* Vista para ver los threads creados */

CREATE VIEW thread_alive AS -- DROP VIEW thread_alive;
SELECT
	th.fk_post AS 'ID',
	th.titulo AS 'Thread',
    pt.mensaje AS 'Descripcion',
    bo.nombre AS 'Board',
    u.nombre AS 'User',
    pt.imagen AS 'Imagen'
FROM
	post pt
JOIN board bo ON pt.fk_board = bo.id
JOIN thread th ON th.fk_post = pt.id
JOIN postUser u ON pt.fk_user = u.id;

SELECT * FROM thread_alive;
SELECT nombre FROM board;

/* Vista para ver posts */
CREATE VIEW viewPosts AS
SELECT
    th.fk_post AS 'Thread',
	pt.id AS 'Post',
    pt.mensaje,
    rp.fk_reply AS 'Reply',
    u.nombre AS 'User',
    b.nombre AS 'Board',
    pt.imagen AS 'Imagen'
FROM
	post pt
JOIN post_thread pth ON pt.id = pth.fk_post
JOIN thread th ON pth.fk_thread = th.fk_post
JOIN reply rp ON pt.id = rp.fk_post
JOIN postUser u ON u.id = pt.fk_user
JOIN board b ON b.id = pt.fk_board; -- DROP VIEW viewPosts;

SELECT * FROM viewPosts;
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