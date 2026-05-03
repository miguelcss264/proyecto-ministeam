CREATE DATABASE IF NOT EXISTS ministeam CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ministeam;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(120) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol ENUM('cliente','admin') DEFAULT 'cliente'
);

CREATE TABLE juegos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(120) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(6,2) NOT NULL
);

CREATE TABLE biblioteca (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    juego_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (juego_id) REFERENCES juegos(id) ON DELETE CASCADE,
    UNIQUE (usuario_id, juego_id)
);