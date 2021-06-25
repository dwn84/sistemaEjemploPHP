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
    imagen varchar(50)
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
)

