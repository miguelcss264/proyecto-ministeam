<?php include __DIR__ . '/../layouts/header.php'; ?>

<h2><?= $juego ? 'Editar' : 'Crear' ?> Juego</h2>

<form method="POST" action="index.php?controller=juego&action=<?= $juego ? 'update' : 'store' ?>">
    <?php if ($juego): ?>
        <input type="hidden" name="id" value="<?= $juego['id'] ?>">
    <?php endif; ?>
    <input type="text" name="titulo" placeholder="Título" value="<?= $juego['titulo'] ?? '' ?>" required>
    <textarea name="descripcion" placeholder="Descripción"><?= $juego['descripcion'] ?? '' ?></textarea>
    <input type="number" step="0.01" name="precio" placeholder="Precio" value="<?= $juego['precio'] ?? '' ?>" required>
    <button type="submit">Guardar</button>
</form>

<?php include __DIR__ . '/../layouts/footer.php'; ?>