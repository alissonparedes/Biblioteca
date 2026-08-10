<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>Libros</h2>
<div class="top-actions">
    <a class="btn btn-primary" href="index.php?controller=libro&action=create">+ Nuevo libro</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Categoría</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($libros as $libro): ?>
        <tr>
            <td><?= htmlspecialchars($libro['id']) ?></td>
            <td><?= htmlspecialchars($libro['titulo']) ?></td>
            <td><?= htmlspecialchars($libro['autor']) ?></td>
            <td><?= htmlspecialchars($libro['categoria_nombre']) ?></td>
            <td><?= htmlspecialchars($libro['stock']) ?></td>
            <td>
                <a class="btn btn-warning" href="index.php?controller=libro&action=edit&id=<?= $libro['id'] ?>">Editar</a>
                <a class="btn btn-danger" href="index.php?controller=libro&action=delete&id=<?= $libro['id'] ?>"
                   onclick="return confirm('¿Eliminar este libro?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($libros)): ?>
        <tr><td colspan="6">No hay libros registrados.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require __DIR__ . '/../layout/footer.php'; ?>
