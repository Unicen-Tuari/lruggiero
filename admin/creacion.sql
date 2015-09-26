/*###################################################
###                TABLA CATEGORIA                ###
###################################################*/

CREATE TABLE categoria (
	id integer NOT NULL AUTO_INCREMENT,
	nombre varchar(30) NULL,
	CONSTRAINT pk_categoria PRIMARY KEY (id)
);

/*#################################################*/



/*###################################################
###                 TABLA NOTICIA                 ###
###################################################*/

CREATE TABLE noticia (
	id integer NOT NULL AUTO_INCREMENT,
	categoria integer NOT NULL,
	titulo varchar(30),
	contenido varchar(5000),
	imagen varchar(50),
	CONSTRAINT pk_noticia PRIMARY KEY (id)
);

	ALTER TABLE noticia
	ADD CONSTRAINT fk_noticia_categoria FOREIGN KEY (categoria)
		REFERENCES categoria (id)
			ON DELETE CASCADE
			ON UPDATE CASCADE;

/*#################################################*/