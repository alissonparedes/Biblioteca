# Sistema de Gestión de Biblioteca — MVC en PHP

Aplicación web desarrollada en **PHP puro** siguiendo el patrón de diseño
**MVC (Modelo–Vista–Controlador)**, sin frameworks externos, con conexión a
**MySQL** mediante PDO.

## Base de datos

El sistema usa **3 tablas relacionadas**:

| Tabla        | Descripción                                              | Relación                          |
|--------------|-----------------------------------------------------------|------------------------------------|
| `categorias` | Categorías temáticas de los libros                        | —                                   |
| `libros`     | Catálogo de libros                                        | `categoria_id` → `categorias.id`   |
| `prestamos`  | Registro de préstamos y devoluciones de libros             | `libro_id` → `libros.id`           |

El script completo está en [`database/schema.sql`](database/schema.sql).

## Estructura del proyecto (MVC)

```
biblioteca-mvc/
├── config/
│   └── Database.php          # Conexión PDO (Singleton)
├── models/
│   ├── Categoria.php
│   ├── Libro.php
│   └── Prestamo.php
├── controllers/
│   ├── CategoriaController.php
│   ├── LibroController.php
│   └── PrestamoController.php
├── views/
│   ├── layout/                # header/footer compartidos
│   ├── categorias/
│   ├── libros/
│   └── prestamos/
├── public/
│   ├── index.php               # Front controller (enrutador)
│   ├── .htaccess
│   └── css/style.css
├── database/
│   └── schema.sql
└── README.md
```

## Funcionalidades

- CRUD completo de **Categorías**
- CRUD completo de **Libros** (asociados a una categoría)
- Registro de **Préstamos**, marcar como devuelto y control automático de
  stock (se descuenta al prestar y se repone al devolver)

## Requisitos

- PHP 7.4 o superior (con extensión `pdo_mysql`)
- MySQL / MariaDB
- Servidor web (Apache/XAMPP/WAMP/Laragon) o el servidor embebido de PHP



