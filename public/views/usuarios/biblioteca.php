<?php include __DIR__ . '/../layouts/header.php'; ?>

<h2>Mi biblioteca</h2>

<?php if (empty($juegos)): ?>
  <p>
    Aún no has añadido juegos. Puedes ver el catálogo en
    <a href="index.php?controller=juego&action=index">Juegos</a>.
  </p>
<?php else: ?>
  <p>
    Tienes <?= count($juegos) ?> juego<?= (count($juegos) === 1) ? '' : 's' ?> en tu biblioteca:
  </p>

  <ul>
    <?php foreach ($juegos as $j): ?>
      <li>
        <strong><?= htmlspecialchars($j['titulo']) ?></strong>
        <?php if (!empty($j['descripcion'])): ?>
          — <?= htmlspecialchars($j['descripcion']) ?>
        <?php endif; ?>
        — $<?= number_format((float)$j['precio'], 2) ?>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php include __DIR__ . '/../layouts/footer.php'; ?>