<?php include __DIR__ . '/../layouts/header.php'; ?>

<h2>Lista de Juegos</h2>

<?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] === 'admin'): ?>
    <a href="index.php?controller=juego&action=create">➕ Crear juego</a>
<?php endif; ?>

<ul>
<?php foreach ($juegos as $j): ?>
    <li>
        <strong><?= htmlspecialchars($j['titulo']) ?></strong>
        - <?= htmlspecialchars($j['descripcion']) ?>
        - $<?= $j['precio'] ?>

        <?php if (isset($_SESSION['usuario'])): ?>
            <a href="index.php?controller=juego&action=addToLibrary&id=<?= $j['id'] ?>">Añadir</a>
        <?php endif; ?>

        <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] === 'admin'): ?>
            <a href="index.php?controller=juego&action=edit&id=<?= $j['id'] ?>">Editar</a>
            <a href="index.php?controller=juego&action=delete&id=<?= $j['id'] ?>">Eliminar</a>
        <?php endif; ?>
    </li>
<?php endforeach; ?>
</ul>

<?php include __DIR__ . '/../layouts/footer.php'; ?>