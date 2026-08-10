<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>Nuevo libro</h2>
<form method="POST" action="index.php?controller=libro&action=store">
    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="titulo" required>

    <label for="autor">Autor</label>
    <input type="text" id="autor" name="autor" required>

    <label for="categoria_id">Categoría</label>
    <select id="categoria_id" name="categoria_id" required>
        <?php foreach ($categorias as $cat): ?>
        <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nombre']) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="stock">Stock</label>
    <input type="number" id="stock" name="stock" min="0" value="1" required>

    <div class="actions">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn" href="index.php?controller=libro&action=index">Cancelar</a>
    </div>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
