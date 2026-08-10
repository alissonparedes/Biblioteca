-- ============================================
-- Sistema de Gestión de Biblioteca - Esquema BD
-- ============================================

CREATE DATABASE IF NOT EXISTS biblioteca_mvc
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE biblioteca_mvc;

-- Tabla 1: Categorías
CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Tabla 2: Libros (relacionada con categorias)
CREATE TABLE IF NOT EXISTS libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(150) NOT NULL,
    categoria_id INT NOT NULL,
    stock INT NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabla 3: Préstamos (relacionada con libros)
CREATE TABLE IF NOT EXISTS prestamos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    libro_id INT NOT NULL,
    nombre_usuario VARCHAR(150) NOT NULL,
    fecha_prestamo DATE NOT NULL,
    fecha_devolucion DATE NULL,
    estado ENUM('prestado', 'devuelto') NOT NULL DEFAULT 'prestado',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (libro_id) REFERENCES libros(id)
        ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Datos de ejemplo
INSERT INTO categorias (nombre, descripcion) VALUES
('Ficción', 'Novelas y cuentos de ficción'),
('Tecnología', 'Libros de programación e informática'),
('Historia', 'Libros de historia general');

INSERT INTO libros (titulo, autor, categoria_id, stock) VALUES
('Cien años de soledad', 'Gabriel García Márquez', 1, 3),
('Clean Code', 'Robert C. Martin', 2, 5),
('Breve historia del tiempo', 'Stephen Hawking', 3, 2);

INSERT INTO prestamos (libro_id, nombre_usuario, fecha_prestamo, fecha_devolucion, estado) VALUES
(1, 'Ana Torres', '2026-08-01', NULL, 'prestado'),
(2, 'Luis Pérez', '2026-07-20', '2026-08-01', 'devuelto');
