<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>Editar libro</h2>
<form method="POST" action="index.php?controller=libro&action=update">
    <input type="hidden" name="id" value="<?= htmlspecialchars($libro['id']) ?>">

    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($libro['titulo']) ?>" required>

    <label for="autor">Autor</label>
    <input type="text" id="autor" name="autor" value="<?= htmlspecialchars($libro['autor']) ?>" required>

    <label for="categoria_id">Categoría</label>
    <select id="categoria_id" name="categoria_id" required>
        <?php foreach ($categorias as $cat): ?>
        <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $libro['categoria_id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($cat['nombre']) ?>
        </option>
        <?php endforeach; ?>
    </select>

    <label for="stock">Stock</label>
    <input type="number" id="stock" name="stock" min="0" value="<?= htmlspecialchars($libro['stock']) ?>" required>

    <div class="actions">
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a class="btn" href="index.php?controller=libro&action=index">Cancelar</a>
    </div>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
