CREATE DATABASE todolist CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE todolist;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    activo TINYINT(1) NOT NULL DEFAULT 1
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO usuario (usuario, password) VALUES ('admin', 'password');

CREATE TABLE tarea (
    id_tarea INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL,
    descripcion VARCHAR(150) NOT NULL,
    is_completed TINYINT(1) NOT NULL DEFAULT 0,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    is_activo TINYINT(1) NOT NULL DEFAULT 1,
    usuarioId INT NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO tarea (titulo, descripcion, usuarioId) VALUES ('Tarea 1', 'Descripcion de la tarea 1', 1);