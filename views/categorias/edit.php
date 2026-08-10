<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>Editar categoría</h2>
<form method="POST" action="index.php?controller=categoria&action=update">
    <input type="hidden" name="id" value="<?= htmlspecialchars($categoria['id']) ?>">

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($categoria['nombre']) ?>" required>

    <label for="descripcion">Descripción</label>
    <textarea id="descripcion" name="descripcion" rows="3"><?= htmlspecialchars($categoria['descripcion']) ?></textarea>

    <div class="actions">
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a class="btn" href="index.php?controller=categoria&action=index">Cancelar</a>
    </div>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
