CREATE DATABASE gestion_capacitaciones;
USE gestion_capacitaciones;

CREATE TABLE temas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    tipo ENUM('Capacitación', 'Entrenamiento') NOT NULL,
    objetivo TEXT NOT NULL,
    facilitador_nombre VARCHAR(100) NOT NULL,
    facilitador_cargo VARCHAR(100) NOT NULL
);

CREATE TABLE asistentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tema_id INT,
    nombre VARCHAR(100) NOT NULL,
    cargo VARCHAR(100) NOT NULL,
    firma TEXT,
    FOREIGN KEY (tema_id) REFERENCES temas(id) ON DELETE CASCADE
);

CREATE TABLE verificaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tema_id INT,
    fecha_verificacion DATE,
    responsable_verificacion VARCHAR(100),
    FOREIGN KEY (tema_id) REFERENCES temas(id) ON DELETE CASCADE
);