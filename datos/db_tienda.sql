CREATE DATABASE IF NOT EXISTS tienda;

USE tienda;

CREATE TABLE persona (
    rut int(9) not null,
    nombre varchar(20) not null,
    apellidos varchar(50),
    email varchar(50),
    telefono varchar(11),
    CONSTRAINT pk_persona PRIMARY KEY (rut)
);
