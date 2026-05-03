<?php
require_once __DIR__ . '/../config/db.php';

class UsuarioController {
    private $db;

    public function __construct() {
        $this->db = DB::getInstance()->getConnection();
    }

    public function home() {
        include __DIR__ . '/../views/usuarios/home.php';
    }

    public function showLogin() {
        include __DIR__ . '/../views/usuarios/login.php';
    }

    public function showRegister() {
        include __DIR__ . '/../views/usuarios/register.php';
    }

    public function register() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO usuarios (email, password, rol) VALUES (?, ?, 'cliente')");
        $stmt->execute([$email, $hash]);

        header("Location: index.php?controller=usuario&action=showLogin");
        exit;
    }

    public function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['usuario'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'rol' => $user['rol']
            ];
            header("Location: index.php");
            exit;
        }

        $_SESSION['error'] = "Credenciales inválidas";
        header("Location: index.php?controller=usuario&action=showLogin");
        exit;
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
        exit;
    }

    public function biblioteca() {
        if (!$this->isLogged()) {
            header("Location: index.php?controller=usuario&action=showLogin");
            exit;
        }

        $stmt = $this->db->prepare("
            SELECT j.* FROM biblioteca b
            JOIN juegos j ON b.juego_id = j.id
            WHERE b.usuario_id = ?
        ");
        $stmt->execute([$_SESSION['usuario']['id']]);
        $juegos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include __DIR__ . '/../views/usuarios/biblioteca.php';
    }

    public function toggleTheme() {
        $current = $_SESSION['tema'] ?? 'claro';
        $_SESSION['tema'] = ($current === 'claro') ? 'oscuro' : 'claro';
        header("Location: index.php");
        exit;
    }

    private function isLogged() {
        return isset($_SESSION['usuario']);
    }
}