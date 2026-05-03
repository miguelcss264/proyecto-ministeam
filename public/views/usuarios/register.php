<?php include __DIR__ . '/../layouts/header.php'; ?>

<h2>Registro</h2>

<form method="POST" action="index.php?controller=usuario&action=register">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
</form>

<?php include __DIR__ . '/../layouts/footer.php'; ?>