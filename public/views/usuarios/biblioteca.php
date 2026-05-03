<?php include __DIR__ . '/../layouts/header.php'; ?>

<h2>Mi Biblioteca</h2>

<ul>
<?php foreach ($juegos as $j): ?>
    <li><?= htmlspecialchars($j['titulo']) ?> - $<?= $j['precio'] ?></li>
<?php endforeach; ?>
</ul>

<?php include __DIR__ . '/../layouts/footer.php'; ?>