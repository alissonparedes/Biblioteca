<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>Nuevo préstamo</h2>
<form method="POST" action="index.php?controller=prestamo&action=store">
    <label for="libro_id">Libro</label>
    <select id="libro_id" name="libro_id" required>
        <?php foreach ($libros as $libro): ?>
        <option value="<?= $libro['id'] ?>" <?= $libro['stock'] <= 0 ? 'disabled' : '' ?>>
            <?= htmlspecialchars($libro['titulo']) ?> (stock: <?= $libro['stock'] ?>)
        </option>
        <?php endforeach; ?>
    </select>

    <label for="nombre_usuario">Nombre del usuario</label>
    <input type="text" id="nombre_usuario" name="nombre_usuario" required>

    <label for="fecha_prestamo">Fecha de préstamo</label>
    <input type="date" id="fecha_prestamo" name="fecha_prestamo" value="<?= date('Y-m-d') ?>" required>

    <div class="actions">
        <button type="submit" class="btn btn-success">Registrar préstamo</button>
        <a class="btn" href="index.php?controller=prestamo&action=index">Cancelar</a>
    </div>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
