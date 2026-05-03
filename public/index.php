<?php
session_start();

$controller = $_GET['controller'] ?? 'usuario';
$action = $_GET['action'] ?? 'home';

switch ($controller) {
    case 'usuario':
        require_once __DIR__ . '/controllers/UsuarioController.php';
        $c = new UsuarioController();
        break;
    case 'juego':
        require_once __DIR__ . '/controllers/JuegoController.php';
        $c = new JuegoController();
        break;
    default:
        die("Controlador no válido");
}

if (!method_exists($c, $action)) {
    die("Acción no válida");
}

$c->$action();