/*###################################################
###                TABLA CATEGORIA                ###
###################################################*/

CREATE TABLE categoria (
	id integer NOT NULL AUTO_INCREMENT,
	nombre varchar(30) NOT NULL,
	CONSTRAINT pk_categoria PRIMARY KEY (id),
	CONSTRAINT uk_categoria UNIQUE (nombre)
);

/*#################################################*/



/*###################################################
###                 TABLA NOTICIA                 ###
###################################################*/

CREATE TABLE noticia (
	id integer NOT NULL AUTO_INCREMENT,
	id_categoria integer NOT NULL,
	titulo varchar(80) NOT NULL,
	contenido varchar(5000) NOT NULL,
	imagen varchar(80),
	fecha varchar(9) NOT NULL,
	hora varchar(5) NOT NULL,
	CONSTRAINT pk_noticia PRIMARY KEY (id),
	CONSTRAINT uk_noticia UNIQUE (titulo)
);

	ALTER TABLE noticia
	ADD CONSTRAINT fk_noticia_categoria FOREIGN KEY (id_categoria)
		REFERENCES categoria (id)
			ON DELETE CASCADE
			ON UPDATE CASCADE;

/*#################################################*/



/*###################################################
###                 TABLA IMAGEN                  ###
###################################################*/

CREATE TABLE imagen (
	id integer NOT NULL AUTO_INCREMENT,
	id_noticia integer NOT NULL,
	ruta varchar(100) NOT NULL,
	CONSTRAINT pk_imagen PRIMARY KEY (id),
	CONSTRAINT uk_noticia UNIQUE (ruta)
);

	ALTER TABLE imagen
	ADD CONSTRAINT fk_imagen_noticia FOREIGN KEY (id_noticia)
		REFERENCES noticia (id)
			ON DELETE CASCADE
			ON UPDATE CASCADE;

/*#################################################*/