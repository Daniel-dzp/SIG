CREATE SCHEMA cursos;

CREATE TABLE cursos.alumno ( 
	correo               varchar(64)  NOT NULL  ,
	nombre               varchar(64)    ,
	apaterno             varchar(64)    ,
	amaterno             varchar(64)    ,
	clave                varchar(32)    ,
	CONSTRAINT pk_alumno_correo PRIMARY KEY ( correo )
 ) engine=InnoDB;

CREATE TABLE cursos.maestro ( 
	nombre               varchar(64)    ,
	apaterno             varchar(64)    ,
	amaterno             varchar(64)    ,
	nombre_escuela       varchar(128)    ,
	correo               varchar(64)  NOT NULL  ,
	clave                varchar(32)    ,
	CONSTRAINT pk_maestro_correo PRIMARY KEY ( correo )
 ) engine=InnoDB;

CREATE TABLE cursos.curso ( 
	clave                varchar(12)  NOT NULL  ,
	curso                varchar(64)    ,
	fecha                datetime    ,
	correo               varchar(64)    ,
	CONSTRAINT pk_curso_clave PRIMARY KEY ( clave ),
	CONSTRAINT fk_curso_maestro FOREIGN KEY ( correo ) REFERENCES cursos.maestro( correo ) ON DELETE NO ACTION ON UPDATE NO ACTION
 ) engine=InnoDB;

CREATE INDEX idx_curso_id_maestro ON cursos.curso ( correo );

CREATE TABLE cursos.recurso ( 
	id_recurso           int  NOT NULL  AUTO_INCREMENT,
	recurso              varchar(64)  NOT NULL  ,
	fecha                datetime    ,
	descripcion          text    ,
	clave                varchar(12)    ,
	CONSTRAINT pk_recurso_id_recurso PRIMARY KEY ( id_recurso ),
	CONSTRAINT fk_recurso_curso FOREIGN KEY ( clave ) REFERENCES cursos.curso( clave ) ON DELETE NO ACTION ON UPDATE NO ACTION
 ) engine=InnoDB;

CREATE INDEX idx_recurso_clave ON cursos.recurso ( clave );

CREATE TABLE cursos.actividad ( 
	id_actividad         int  NOT NULL  AUTO_INCREMENT,
	nombre               varchar(64)    ,
	fecha_inicio         date    ,
	fecha_finaliza       date    ,
	no_parcial           int    ,
	valor_parcial        int    ,
	clave                varchar(12)    ,
	descripcion          text    ,
	CONSTRAINT pk_actividades_id_actividad PRIMARY KEY ( id_actividad ),
	CONSTRAINT fk_actividades_curso FOREIGN KEY ( clave ) REFERENCES cursos.curso( clave ) ON DELETE NO ACTION ON UPDATE NO ACTION
 ) engine=InnoDB;

CREATE INDEX idx_actividades_clave ON cursos.actividad ( clave );

CREATE TABLE cursos.alumno_curso ( 
	id_alumno_curso      int  NOT NULL  AUTO_INCREMENT,
	clave                varchar(12)    ,
	correo               varchar(64)    ,
	CONSTRAINT pk_alumno_curso_id_alumno_curso PRIMARY KEY ( id_alumno_curso ),
	CONSTRAINT fk_alumno_curso_curso FOREIGN KEY ( clave ) REFERENCES cursos.curso( clave ) ON DELETE NO ACTION ON UPDATE NO ACTION,
	CONSTRAINT fk_alumno_curso_alumno FOREIGN KEY ( correo ) REFERENCES cursos.alumno( correo ) ON DELETE NO ACTION ON UPDATE NO ACTION
 ) engine=InnoDB;

CREATE INDEX idx_alumno_curso_clave ON cursos.alumno_curso ( clave );

CREATE INDEX idx_alumno_curso_correo ON cursos.alumno_curso ( correo );

CREATE TABLE cursos.aviso ( 
	id_aviso             int  NOT NULL  AUTO_INCREMENT,
	aviso                text    ,
	fecha                datetime   DEFAULT CURRENT_TIMESTAMP ,
	clave                varchar(12)    ,
	CONSTRAINT pk_aviso_id_aviso PRIMARY KEY ( id_aviso ),
	CONSTRAINT fk_aviso_curso FOREIGN KEY ( clave ) REFERENCES cursos.curso( clave ) ON DELETE NO ACTION ON UPDATE NO ACTION
 ) engine=InnoDB;

CREATE INDEX idx_aviso_clave ON cursos.aviso ( clave );

CREATE TABLE cursos.entrega ( 
	id_entrega           int  NOT NULL  AUTO_INCREMENT,
	correo               varchar(64)    ,
	id_actividad         int    ,
	fecha                datetime    ,
	archivo              varchar(64)    ,
	calificacion         int    ,
	CONSTRAINT pk_entregas_id_entrega PRIMARY KEY ( id_entrega ),
	CONSTRAINT fk_entregas_alumno FOREIGN KEY ( correo ) REFERENCES cursos.alumno( correo ) ON DELETE NO ACTION ON UPDATE NO ACTION,
	CONSTRAINT fk_entrega_actividad FOREIGN KEY ( id_actividad ) REFERENCES cursos.actividad( id_actividad ) ON DELETE NO ACTION ON UPDATE NO ACTION
 ) engine=InnoDB;

CREATE INDEX idx_entregas_correo ON cursos.entrega ( correo );

CREATE INDEX idx_entrega_id_actividad ON cursos.entrega ( id_actividad );

