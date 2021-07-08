drop database if exists InstitucionEducativaX;
create database InstitucionEducativaX;
use InstitucionEducativaX;
create table TipoUsuario(
	idTipoUsuario int AUTO_INCREMENT primary key,
    descripcion varchar(50)
);
create table Grupos(
	idGrupo int AUTO_INCREMENT primary key,
    descripcion varchar(50)
);
create table Carrusel(
	idCarrusel int AUTO_INCREMENT primary key,
    imagen varchar(50),
	visible tinyint
);
create table Usuarios(
	cedula varchar(11) primary key, 
    nombre varchar(50), 
    apellido varchar(50), 
    password varchar(32), 
    tipoUsuario int,
    foreign key(tipoUsuario) REFERENCES TipoUsuario(idTipoUsuario)
);
create table RegistroGrupo(
	idGrupo int, 
    cedula varchar(11),
    primary key(idGrupo, cedula),
    foreign key (idGrupo) REFERENCES Grupos(idGrupo),
    foreign key (cedula) REFERENCES Usuarios(cedula)    
);
create table Noticias(
	idNoticia int AUTO_INCREMENT primary key, 
    idGrupo int, 
    titular varchar(55),
    descripcion varchar(210), 
    fecha date,
    imagen varchar(55),
    foreign key (idGrupo) REFERENCES Grupos(idGrupo)
);
create table Evaluaciones(
	idEvaluacion int AUTO_INCREMENT primary key, 
    idGrupo int,
    titular varchar(100),
    descripción varchar(210), 
    adjuntoInstrucciones varchar(55),
    fechaLimite date,
    foreign key (idGrupo) REFERENCES Grupos(idGrupo)
);
create table Notas(
    idNota int AUTO_INCREMENT primary key, 
    idEvaluacion int, 
    cedula varchar(11), 
    valornota double, 
    adjuntoSolucion varchar(55),
	foreign key (idEvaluacion) REFERENCES Evaluaciones(idEvaluacion),
	foreign key (cedula) REFERENCES Usuarios(cedula)
);

INSERT INTO carrusel VALUES (1, 'img/carrusel1.jpg',1), (2, 'img/carrusel2.jpg',1),(3, 'img/carrusel3.jpg',1),(4, 'img/carrusel4.jpg',1)  ; 
INSERT INTO tipousuario (descripcion) VALUES ('administrador'), ('profesor'),('estudiante'); 
INSERT INTO usuarios (cedula, nombre, apellido, password, tipoUsuario) VALUES ('55555', 'Eddie', 'Smith', MD5('123456'), '1'), ('44444', 'Tony', 'Choper', MD5('123456'), '2'),('33333','Esperanza','Gomez',MD5('123456'),'3'); 
INSERT INTO grupos (idGrupo, descripcion) VALUES (NULL, '2222243'), (NULL, '2222147');
INSERT INTO registrogrupo (idGrupo, cedula) VALUES (1, '33333');