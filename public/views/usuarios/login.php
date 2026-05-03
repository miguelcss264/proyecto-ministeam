<?php include __DIR__ . '/../layouts/header.php'; ?>

<h2>Login</h2>

<?php if (isset($_SESSION['error'])): ?>
    <p style="color:red"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
<?php endif; ?>

<form method="POST" action="index.php?controller=usuario&action=login">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Entrar</button>
</form>

<?php include __DIR__ . '/../layouts/footer.php'; ?>