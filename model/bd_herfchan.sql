CREATE DATABASE bd_herfchan;
USE bd_herfchan;

CREATE TABLE IF NOT EXISTS board(
	id LONG AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(200)
); -- DROP TABLE board;

CREATE TABLE IF NOT EXISTS moderador(
	id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(200),
    fk_board LONG REFERENCES board (id)
); -- DROP TABLE moderador;

CREATE TABLE IF NOT EXISTS ban(
	ip VARBINARY(200) UNIQUE PRIMARY KEY,
    reason VARCHAR(200),
    fk_moderador INT REFERENCES moderador (id)
); -- DROP TABLE ban;

CREATE TABLE IF NOT EXISTS postUser(
	id LONG AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(200)
); -- DROP TABLE postUser;

CREATE TABLE IF NOT EXISTS thread(
	id LONG AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200),
    fk_board INT REFERENCES board (id),
    fk_user INT REFERENCES postUser (id)
); -- DROP TABLE thread;

CREATE TABLE IF NOT EXISTS post(
	id LONG AUTO_INCREMENT PRIMARY KEY,
    mensaje VARCHAR(60000),
    fk_thread INT REFERENCES thread (id),
    fk_user INT REFERENCES postUser (id),
    isReply BOOLEAN
); -- DROP TABLE post;

CREATE TABLE IF NOT EXISTS reply(
	id LONG AUTO_INCREMENT PRIMARY KEY,
    fk_post LONG REFERENCES post (id),
    fk_reply LONG REFERENCES post (id)
); -- DROP TABLE reply;