<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>Préstamos</h2>
<div class="top-actions">
    <a class="btn btn-primary" href="index.php?controller=prestamo&action=create">+ Nuevo préstamo</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Libro</th>
            <th>Usuario</th>
            <th>Fecha préstamo</th>
            <th>Fecha devolución</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($prestamos as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['id']) ?></td>
            <td><?= htmlspecialchars($p['libro_titulo']) ?></td>
            <td><?= htmlspecialchars($p['nombre_usuario']) ?></td>
            <td><?= htmlspecialchars($p['fecha_prestamo']) ?></td>
            <td><?= $p['fecha_devolucion'] ? htmlspecialchars($p['fecha_devolucion']) : '—' ?></td>
            <td>
                <span class="badge badge-<?= $p['estado'] ?>">
                    <?= $p['estado'] === 'prestado' ? 'Prestado' : 'Devuelto' ?>
                </span>
            </td>
            <td>
                <?php if ($p['estado'] === 'prestado'): ?>
                <a class="btn btn-success" href="index.php?controller=prestamo&action=devolver&id=<?= $p['id'] ?>">Marcar devuelto</a>
                <?php endif; ?>
                <a class="btn btn-danger" href="index.php?controller=prestamo&action=delete&id=<?= $p['id'] ?>"
                   onclick="return confirm('¿Eliminar este préstamo?');">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php if (empty($prestamos)): ?>
        <tr><td colspan="7">No hay préstamos registrados.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require __DIR__ . '/../layout/footer.php'; ?>
