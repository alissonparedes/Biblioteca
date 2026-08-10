<?php
require_once __DIR__ . '/../config/Database.php';

class Prestamo
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT p.*, l.titulo AS libro_titulo
                FROM prestamos p
                INNER JOIN libros l ON p.libro_id = l.id
                ORDER BY p.id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM prestamos WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($libro_id, $nombre_usuario, $fecha_prestamo)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO prestamos (libro_id, nombre_usuario, fecha_prestamo, estado)
             VALUES (:libro_id, :nombre_usuario, :fecha_prestamo, 'prestado')"
        );
        return $stmt->execute([
            'libro_id' => $libro_id,
            'nombre_usuario' => $nombre_usuario,
            'fecha_prestamo' => $fecha_prestamo
        ]);
    }

    public function marcarDevuelto($id, $fecha_devolucion)
    {
        $stmt = $this->db->prepare(
            "UPDATE prestamos SET estado = 'devuelto', fecha_devolucion = :fecha
             WHERE id = :id"
        );
        return $stmt->execute(['id' => $id, 'fecha' => $fecha_devolucion]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM prestamos WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
