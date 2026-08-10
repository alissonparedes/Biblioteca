<?php
require_once __DIR__ . '/../config/Database.php';

class Categoria
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM categorias ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM categorias WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($nombre, $descripcion)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO categorias (nombre, descripcion) VALUES (:nombre, :descripcion)"
        );
        return $stmt->execute(['nombre' => $nombre, 'descripcion' => $descripcion]);
    }

    public function update($id, $nombre, $descripcion)
    {
        $stmt = $this->db->prepare(
            "UPDATE categorias SET nombre = :nombre, descripcion = :descripcion WHERE id = :id"
        );
        return $stmt->execute(['id' => $id, 'nombre' => $nombre, 'descripcion' => $descripcion]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM categorias WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
