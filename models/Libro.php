<?php
require_once __DIR__ . '/../config/Database.php';

class Libro
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT l.*, c.nombre AS categoria_nombre
                FROM libros l
                INNER JOIN categorias c ON l.categoria_id = c.id
                ORDER BY l.id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM libros WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($titulo, $autor, $categoria_id, $stock)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO libros (titulo, autor, categoria_id, stock)
             VALUES (:titulo, :autor, :categoria_id, :stock)"
        );
        return $stmt->execute([
            'titulo' => $titulo,
            'autor' => $autor,
            'categoria_id' => $categoria_id,
            'stock' => $stock
        ]);
    }

    public function update($id, $titulo, $autor, $categoria_id, $stock)
    {
        $stmt = $this->db->prepare(
            "UPDATE libros SET titulo = :titulo, autor = :autor,
             categoria_id = :categoria_id, stock = :stock WHERE id = :id"
        );
        return $stmt->execute([
            'id' => $id,
            'titulo' => $titulo,
            'autor' => $autor,
            'categoria_id' => $categoria_id,
            'stock' => $stock
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM libros WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function updateStock($id, $cantidad)
    {
        $stmt = $this->db->prepare(
            "UPDATE libros SET stock = stock + :cantidad WHERE id = :id"
        );
        return $stmt->execute(['id' => $id, 'cantidad' => $cantidad]);
    }
}
