<?php
require_once __DIR__ . '/../models/Categoria.php';

class CategoriaController
{
    private $model;

    public function __construct()
    {
        $this->model = new Categoria();
    }

    public function index()
    {
        $categorias = $this->model->getAll();
        require __DIR__ . '/../views/categorias/index.php';
    }

    public function create()
    {
        require __DIR__ . '/../views/categorias/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST['nombre'], $_POST['descripcion']);
        }
        header('Location: index.php?controller=categoria&action=index');
        exit;
    }

    public function edit()
    {
        $categoria = $this->model->getById($_GET['id']);
        require __DIR__ . '/../views/categorias/edit.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
        }
        header('Location: index.php?controller=categoria&action=index');
        exit;
    }

    public function delete()
    {
        $this->model->delete($_GET['id']);
        header('Location: index.php?controller=categoria&action=index');
        exit;
    }
}
