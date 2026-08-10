<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>Nueva categoría</h2>
<form method="POST" action="index.php?controller=categoria&action=store">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="descripcion">Descripción</label>
    <textarea id="descripcion" name="descripcion" rows="3"></textarea>

    <div class="actions">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn" href="index.php?controller=categoria&action=index">Cancelar</a>
    </div>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>
