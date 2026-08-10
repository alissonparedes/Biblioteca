<?php
require_once __DIR__ . '/../models/Libro.php';
require_once __DIR__ . '/../models/Categoria.php';

class LibroController
{
    private $model;
    private $categoriaModel;

    public function __construct()
    {
        $this->model = new Libro();
        $this->categoriaModel = new Categoria();
    }

    public function index()
    {
        $libros = $this->model->getAll();
        require __DIR__ . '/../views/libros/index.php';
    }

    public function create()
    {
        $categorias = $this->categoriaModel->getAll();
        require __DIR__ . '/../views/libros/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create(
                $_POST['titulo'],
                $_POST['autor'],
                $_POST['categoria_id'],
                $_POST['stock']
            );
        }
        header('Location: index.php?controller=libro&action=index');
        exit;
    }

    public function edit()
    {
        $libro = $this->model->getById($_GET['id']);
        $categorias = $this->categoriaModel->getAll();
        require __DIR__ . '/../views/libros/edit.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update(
                $_POST['id'],
                $_POST['titulo'],
                $_POST['autor'],
                $_POST['categoria_id'],
                $_POST['stock']
            );
        }
        header('Location: index.php?controller=libro&action=index');
        exit;
    }

    public function delete()
    {
        $this->model->delete($_GET['id']);
        header('Location: index.php?controller=libro&action=index');
        exit;
    }
}
