<?php
require_once __DIR__ . '/../models/Prestamo.php';
require_once __DIR__ . '/../models/Libro.php';

class PrestamoController
{
    private $model;
    private $libroModel;

    public function __construct()
    {
        $this->model = new Prestamo();
        $this->libroModel = new Libro();
    }

    public function index()
    {
        $prestamos = $this->model->getAll();
        require __DIR__ . '/../views/prestamos/index.php';
    }

    public function create()
    {
        $libros = $this->libroModel->getAll();
        require __DIR__ . '/../views/prestamos/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create(
                $_POST['libro_id'],
                $_POST['nombre_usuario'],
                $_POST['fecha_prestamo']
            );
            // Descuenta una unidad de stock del libro prestado
            $this->libroModel->updateStock($_POST['libro_id'], -1);
        }
        header('Location: index.php?controller=prestamo&action=index');
        exit;
    }

    public function devolver()
    {
        $prestamo = $this->model->getById($_GET['id']);
        $this->model->marcarDevuelto($_GET['id'], date('Y-m-d'));
        // Devuelve la unidad de stock al libro
        $this->libroModel->updateStock($prestamo['libro_id'], 1);
        header('Location: index.php?controller=prestamo&action=index');
        exit;
    }

    public function delete()
    {
        $this->model->delete($_GET['id']);
        header('Location: index.php?controller=prestamo&action=index');
        exit;
    }
}
