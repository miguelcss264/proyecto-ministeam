<?php
$tema = $_SESSION['tema'] ?? 'claro';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MiniSteam</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="<?= $tema ?>">
<header>
    <h1>MiniSteam</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="index.php?controller=juego&action=index">Juegos</a>
        <?php if (isset($_SESSION['usuario'])): ?>
            <a href="index.php?controller=usuario&action=biblioteca">Biblioteca</a>
            <a href="index.php?controller=usuario&action=logout">Salir</a>
        <?php else: ?>
            <a href="index.php?controller=usuario&action=showLogin">Login</a>
            <a href="index.php?controller=usuario&action=showRegister">Registro</a>
        <?php endif; ?>
        <a href="index.php?controller=usuario&action=toggleTheme">Tema</a>
    </nav>
</header>
<main>