<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>Categorías</h2>
<div class="top-actions">
    <a class="btn btn-primary" href="index.php?controller=categoria&action=create">+ Nueva categoría</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categorias as $cat): ?>
        <tr>
            <td><?= htmlspecialchars($cat['id']) ?></td>
            <td><?= htmlspecialchars($cat['nombre']) ?></td>
            <td><?= htmlspecialchars($cat['descripcion']) ?></td>
            <td>
                <a class="btn btn-warning" href="index.php?controller=categoria&action=edit&id=<?= $cat['id'] ?>">Editar</a>
                <a class="btn btn-danger" href="index.php?controller=categoria&action=delete&id=<?= $cat['id'] ?>"
                   onclick="return confirm('¿Eliminar esta categoría?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($categorias)): ?>
        <tr><td colspan="4">No hay categorías registradas.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require __DIR__ . '/../layout/footer.php'; ?>
